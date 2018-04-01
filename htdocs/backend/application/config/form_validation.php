<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
           'inquiry/index' => array(
                                    array(
                                            'field' => 'name',
                                            'label' => 'Name',
                                            'rules' => 'required|max_length[255]'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email address',
                                            'rules' => 'required|valid_email|max_length[255]'
                                         ),
                                    array(
                                            'field' => 'url',
                                            'label' => 'Website address',
                                            'rules' => 'max_length[255]'
                                         ),
                                    array(
                                            'field' => 'inquiry-msg',
                                            'label' => 'Message',
                                            'rules' => 'required|max_length[20000]'
                                         ),
                                    )
               );
