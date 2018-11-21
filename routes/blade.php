<?php

Blade::directive('test',function($value){
  return"Wolcome to Test blade".$value;
});
