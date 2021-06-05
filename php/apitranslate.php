<?php
if(isset($_GET["textotraducir"])){

    $origen = $_GET["Lentrada"];
    $textotraducir = $_GET["textotraducir"];
    $traducir = $_GET["Lsalida"];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://systran-systran-platform-for-language-processing-v1.p.rapidapi.com/translation/text/translate?source=".$origen."&target=".$traducir."&input=".$textotraducir,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: systran-systran-platform-for-language-processing-v1.p.rapidapi.com",
            "x-rapidapi-key: dd2c85965bmshb019b93e3c9af86p156e08jsn6cfed33cc052"
        ],
    ]);
        
    $response = curl_exec($curl);
    $err = curl_error($curl);
        
    curl_close($curl);
        
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $json = json_decode($response, true);
        $word = $json['outputs'][0]['output'];
        
    }
}
?>
<?php
    if(!isset($word)){
        $word = "";
    }

?>