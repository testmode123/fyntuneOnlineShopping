<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
        $this->load->model('user');

        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    }
    
    function index(){
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId')
            ); 
            $data['user'] = $this->user->getRows($con); 
             
            
        }

        // Fetch products from the database
        $data['products'] = $this->product->getRows();
        
        // Load the product list view
        $this->load->view('elements/header', $data); 
        $this->load->view('products/index', $data);
        $this->load->view('elements/footer'); 
    }
    
    function addToCart($proID){
        
        // Fetch specific product by ID
        $product = $this->product->getRows($proID);
        
        // Add product to the cart
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['price'],
            'name'    => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);
        
        // Redirect to the cart page
        redirect('cart/');
    }

    function productDetails($proID){
        $data = array();
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId')
            ); 
            $data['user'] = $this->user->getRows($con); 
             
            
        }
        // Fetch specific product by ID
        $product = $this->product->getRows($proID);
        $data['product'] = $product;

        // Load the product list view
        $this->load->view('elements/header', $data); 
        $this->load->view('products/product_details', $data);
        $this->load->view('elements/footer'); 
        
    }
    
}