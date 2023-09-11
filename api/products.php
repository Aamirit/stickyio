<?php

function get_product(){
    $products = array();
    $products['de'][2] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['fr'][2] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['befr'][2] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['benl'][2] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['de'][3] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=> 41.65,"currency"=>"EUR","price_with_symbol"=>"41,65€","normal_price"=>"209,70€","total_price"=>"124,95€");
    $products['fr'][3] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>41.65,"currency"=>"EUR","price_with_symbol"=>"41,65€","normal_price"=>"209,70€","total_price"=>"124,95€");
    $products['befr'][3] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>41.65,"currency"=>"EUR","price_with_symbol"=>"41,65€","normal_price"=>"209,70€","total_price"=>"124,95€");
    $products['benl'][3] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>41.65,"currency"=>"EUR","price_with_symbol"=>"41,65€","normal_price"=>"209,70€","total_price"=>"124,95€");
    $products['de'][4] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=> 47.48,"currency"=>"EUR","price_with_symbol"=>"47,48€","normal_price"=>"139,80€","total_price"=>"94,96€");
    $products['fr'][4] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>47.48,"currency"=>"EUR","price_with_symbol"=>"47,48€","normal_price"=>"139,80€","total_price"=>"94,96€");
    $products['befr'][4] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>47.48,"currency"=>"EUR","price_with_symbol"=>"47,48€","normal_price"=>"139,80€","total_price"=>"94,96€");
    $products['benl'][4] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>47.48,"currency"=>"EUR","price_with_symbol"=>"47,48€","normal_price"=>"139,80€","total_price"=>"94,96€");
    $products['ie'][2] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>54.90,"currency"=>"GBP","price_with_symbol"=>"54.90 GBP","normal_price"=>"54.90 GBP","total_price"=>"54.90 GBP");
    $products['en-gb'][2] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>54.90,"currency"=>"GBP","price_with_symbol"=>"54.90 GBP","normal_price"=>"54.90 GBP","total_price"=>"54.90 GBP");
    $products['ie'][3] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>36.65,"currency"=>"GBP","price_with_symbol"=>"36.65 GBP","normal_price"=>"164.70 GBP","total_price"=>"109.95 GBP");
    $products['en-gb'][3] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>36.65,"currency"=>"GBP","price_with_symbol"=>"36.65 GBP","normal_price"=>"164.70 GBP","total_price"=>"109.95 GBP");
    $products['ie'][4] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>36.65,"currency"=>"GBP","price_with_symbol"=>"39.98 GBP","normal_price"=>"164.70 GBP","total_price"=>"79.95 GBP");
    $products['en-gb'][4] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>36.65,"currency"=>"GBP","price_with_symbol"=>"39.98 GBP","normal_price"=>"109.80 GBP","total_price"=>"79.95 GBP");
    $products['chde'][2] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chit'][2] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chfr'][2] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chde'][3] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>39.67,"currency"=>"CHF","price_with_symbol"=>"39.67-CHF","normal_price"=>"207-CHF","total_price"=>"119.01-CHF");
    $products['chit'][3] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>39.67,"currency"=>"CHF","price_with_symbol"=>"39.67-CHF","normal_price"=>"207-CHF","total_price"=>"119.01-CHF");
    $products['chfr'][3] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>39.67,"currency"=>"CHF","price_with_symbol"=>"39.67-CHF","normal_price"=>"207-CHF","total_price"=>"119.01-CHF");
    $products['chde'][4] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>74.5,"currency"=>"CHF","price_with_symbol"=>"74.5-CHF","normal_price"=>"207-CHF","total_price"=>"149-CHF");
    $products['chit'][4] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>74.5,"currency"=>"CHF","price_with_symbol"=>"74.5-CHF","normal_price"=>"207-CHF","total_price"=>"149-CHF");
    $products['chfr'][4] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>74.5,"currency"=>"CHF","price_with_symbol"=>"74.5-CHF","normal_price"=>"207-CHF","total_price"=>"149-CHF");
    $products['us'][2] = array("campaign_id"=>1,"paypal_compaign_id"=>2,"price"=>75.65,"currency"=>"USD","price_with_symbol"=>"$75.65","normal_price"=>"$75.65","total_price"=>"$75.65");
    $products['us'][3] = array("campaign_id"=>1,"paypal_compaign_id"=>2,"price"=>45.07,"currency"=>"USD","price_with_symbol"=>"45.07€","normal_price"=>"$226.95","total_price"=>"$135.23");
    $products['us'][4] = array("campaign_id"=>1,"paypal_compaign_id"=>2,"price"=>51.39,"currency"=>"USD","price_with_symbol"=>"$51.39","normal_price"=>"$151.3","total_price"=>"$102.77");
    //upsells products
    $products['de'][5] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['fr'][5] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['befr'][5] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['benl'][5] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['de'][6] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['fr'][6] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['befr'][6] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['benl'][6] = array("campaign_id"=>3,"paypal_compaign_id"=>6,"price"=>69.90,"currency"=>"EUR","price_with_symbol"=>"69,90€","normal_price"=>"69,90€","total_price"=>"69,90€");
    $products['ie'][5] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>54.90,"currency"=>"GBP","price_with_symbol"=>"54.90 GBP","normal_price"=>"54.90 GBP","total_price"=>"54.90 GBP");
    $products['en-gb'][5] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>54.90,"currency"=>"GBP","price_with_symbol"=>"54.90 GBP","normal_price"=>"54.90 GBP","total_price"=>"54.90 GBP");
    $products['ie'][6] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>54.90,"currency"=>"GBP","price_with_symbol"=>"54.90 GBP","normal_price"=>"54.90 GBP","total_price"=>"54.90 GBP");
    $products['en-gb'][6] = array("campaign_id"=>4,"paypal_compaign_id"=>7,"price"=>54.90,"currency"=>"GBP","price_with_symbol"=>"54.90 GBP","normal_price"=>"54.90 GBP","total_price"=>"54.90 GBP");
    $products['chde'][5] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chit'][5] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chfr'][5] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chde'][6] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chit'][6] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['chfr'][6] = array("campaign_id"=>5,"paypal_compaign_id"=>8,"price"=>69,"currency"=>"CHF","price_with_symbol"=>"69-CHF","normal_price"=>"69-CHF","total_price"=>"69-CHF");
    $products['us'][5] = array("campaign_id"=>1,"paypal_compaign_id"=>2,"price"=>75.65,"currency"=>"USD","price_with_symbol"=>"$75.65","normal_price"=>"$75.65","total_price"=>"$75.65");
    $products['us'][6] = array("campaign_id"=>1,"paypal_compaign_id"=>2,"price"=>75.65,"currency"=>"USD","price_with_symbol"=>"$75.65","normal_price"=>"$75.65","total_price"=>"$75.65");
    return $products;


}