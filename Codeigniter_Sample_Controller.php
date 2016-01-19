<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Results extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_logged_in();
    }

    public function check_logged_in() {
        $session_data = $this->session->userdata('logged_in');
        if (!isset($session_data['id'])) {
            $url = base_url() . "home";
            header('Location: ' . $url);
        }
    }
    
    private function cleanArray($arr){
        foreach ($arr as $key => $val) {
            $trimmed = trim($val);
            $arr[$key] = $trimmed;
            if ($trimmed == NULL || $trimmed === "" || empty($trimmed)) {
                unset($arr[$key]);
            }
        }
        return $arr;
    }
    
    
    public function asin() {
        $post_ids = $this->input->post('ids');
        $this->load->library('amazonapi');
        $list = preg_split("/\\r\\n|\\r|\\n/", $post_ids);
        $cleaned_list = $this->cleanArray($list);
        $list_chunks = array_chunk($cleaned_list, 10);
        $final_array = array();
        $errors = 0;
        foreach ($list_chunks as $arr_chunk) {
            $comma_separated = implode(",", $arr_chunk);
            $request_params = array(
                "Operation" => "ItemLookup",
                "IdType" => "ASIN",
                "ItemId" => "$comma_separated",
                "Availability" => "Available",
                "ResponseGroup" => "Medium, OfferFull",
                "Sort" => "salesrank"
            );
            $response = $this->amazonapi->sendRequest($request_params);
            if (isset($response->Items->Item)) {
                array_push($final_array, $response->Items->Item);
            } else {
                $errors++;
                break;
            }
        }
        if ($errors == 0) {
            $data = array("final_array" => $final_array);
        } else {
            $data = array("error_response" => "<h3 style='color:red'>There was an Error. Please go back and make sure your inputs are correct.</h3>");
        }
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('results_view', $data);
        $this->load->view('templates/footer');
    }

    public function upc() {
        $post_ids = $this->input->post('ids');
        $this->load->library('amazonapi');

        $list = preg_split("/\\r\\n|\\r|\\n/", $post_ids);
        $cleaned_list = $this->cleanArray($list);
        $list_chunks = array_chunk($cleaned_list, 10);

        $final_array = array();
        $errors = 0;
        foreach ($list_chunks as $arr_chunk) {
            $comma_separated = implode(",", $arr_chunk);
            $request_params = array(
                "Operation" => "ItemLookup",
                "IdType" => "UPC",
                "Availability" => "Available",
                "ItemId" => "$comma_separated",
                "ResponseGroup" => "Medium, OfferFull",
                "SearchIndex" => "All"
            );
            $response = $this->amazonapi->sendRequest($request_params);
            if (isset($response->Items->Item)) {
                array_push($final_array, $response->Items->Item);
            } else {
                $errors++;
                break;
            }
        }
        if ($errors == 0) {
            $data = array("final_array" => $final_array);
        } else {
            $data = array("error_response" => "<h3 style='color:red'>There was an Error. Please go back and make sure your inputs are correct.</h3>");
        }
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('results_view', $data);
        $this->load->view('templates/footer');
    }



    public function brand() {
        $pagenum = $this->input->post('page');

        if (!($pagenum)) {
            $pagenum = 1;
        }

        $category_select = $this->input->post("category_select");
        $subcategory_select = $this->input->post("subcategory_select");
        $brand = $this->input->post("brand");

        if ($category_select !== 0 && $subcategory_select !== 0 && $brand !== "") {
            $this->load->library('amazonapi');

            $request_params = array(
                "Operation" => "ItemSearch",
                "Brand" => $brand,
                "BrowseNode" => $subcategory_select,
                "ItemPage" => $pagenum,
                "ResponseGroup" => "Large, OfferFull",
                "Availability" => "Available",
                "Condition" => "All",
                "SearchIndex" => $category_select,
                "Sort" => "salesrank"
            );

            $response = $this->amazonapi->sendRequest($request_params);
            //var_dump($response);

            if (isset($response->Items->Request->Errors)) {
                $err_msg = $response->Items->Request->Errors->Error->Message;
                if ($response->Items->Request->Errors->Error->Code === "AWS.ECommerceService.NoExactMatches") {
                    $data = array(
                        "error_response" => "<h3 style='color:red'>$err_msg</h3>"
                    );
                } else {
                    $data = array(
                        "error_response" => "<h3 style='color:red'>There was an Error. Please go back and make sure your inputs are correct.</h3>"
                    );
                }
            } else {
                $total_pages = $response->Items->TotalPages;

                $final_array = array();

                if ($total_pages) {
                    array_push($final_array, $response->Items->Item);
                    $data = array(
                        "final_array" => $final_array,
                        "total_pages" => $total_pages,
                        "brand" => $brand,
                        "subcategory_select" => $subcategory_select,
                        "category_select" => $category_select,
                        "pagenum" => $pagenum
                    );
                } else {
                    $data = array(
                        "error_response" => "<h3 style='color:red'>There was an Error. Please go back and make sure your inputs are correct.</h3>"
                    );
                }
            }
        } else {
            $data = array(
                "error_response" => "<h3 style='color:red'>There was an Error. Please go back and make sure your inputs are correct.</h3>"
            );
        }

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('results_view', $data);
        $this->load->view('templates/footer');
    }

}
