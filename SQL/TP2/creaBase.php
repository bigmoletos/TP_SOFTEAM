<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//try{
			$connexion=new PDO("mysql:host=localhost;dbname=location","root","root");
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        
//                        select * from location ;