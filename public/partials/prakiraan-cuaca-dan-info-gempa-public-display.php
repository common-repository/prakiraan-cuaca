<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://bmkg.vercel.com
 * @since      1.0.2
 *
 * @package    Prakiraan_Cuaca_Dan_Info_Gempa
 * @subpackage Prakiraan_Cuaca_Dan_Info_Gempa/public/partials
 */
// echo $url_1;

?>


<!-- <div class="container"> -->

<nav class="nav nav-pills flex-column flex-sm-row bg-secondary border-2 border-bottom">

    <a class="flex-sm-fill text-sm-center nav-link text-uppercase text-white active" href="#prakiraan-cuaca" id="prakiraan-cuaca-tab" data-bs-toggle="tab" data-bs-target="#prakiraan-cuaca" type="button" role="tab" aria-controls="prakiraan-cuaca" aria-selected="true">Prakiraan Cuaca</a>
    <a class="flex-sm-fill text-sm-center nav-link text-uppercase text-white" href="#info-gempa" id="info-gempa-tab" data-bs-toggle="tab" data-bs-target="#info-gempa" type="button" role="tab" aria-controls="info-gempa" aria-selected="false">Info Gempa</a>

</nav>

<div class="tab-content border-1 p-2" id="nav-tabContent">
  <div class="tab-pane fade show active" id="prakiraan-cuaca" role="tabpanel" aria-labelledby="prakiraan-cuaca-tab" tabindex="0">
    <div id="load_data"></div>
  </div>
  <div class="tab-pane fade" id="info-gempa" role="tabpanel" aria-labelledby="info-gempa-tab" tabindex="0">
    <div id="getData"></div>
  </div>
</div>



<!-- </div> -->

<?php

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => esc_url('https://api.ip.sb/geoip'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $region = json_decode($response)->region;
    if(json_decode($response)->region === 'West Java') {
        $region = "jawa-barat";
    } else if(json_decode($response)->region === 'Jakarta'){
        $region = "dki-jakarta";
    } else {
        $region = json_decode($response)->region;
    }
    // test
    $url_req_1 = "https://api-bmkg.webflazz.com/weather/" . $region;
    $url_req_2 = "https://api-bmkg.webflazz.com/quake";

?>

<script type="text/javascript">

    (( $ ) => {

        var request = {
            "url": "<?php echo esc_url($url_req_1); ?>",
            "method": "GET",
            "timeout": 0,
            success: (response) => {
                let data = response.data;
                let i = 0;
                let areas = data.areas;

                let html = `<div class="text-center mt-1"><br />Prakiraan cuaca daerah <?php echo json_decode($response)->region; ?> dan Sekitarnya <div> <br /><table class="mt-1 table border-0">

                                <thead>
                                    <th class="bg-secondary text-white">
                                        <td class="bg-secondary text-white">
                                            <b>Tanggal</b>
                                        </td>
                                        <td class="bg-secondary text-white">
                                            <b>Nama kota</b>
                                        </td>
                                        <td class="bg-secondary text-white">
                                            <b>Prakiraan cuaca</b>
                                        </td>
                                    </th>
                                </thead>

                                <tbody>`;

                do {
                    // console.log(areas[i].params[0].times[6].datetime)


                    let date__ = '';
                    if(areas[i].params) {
                        date__ = areas[i].params[0].times[6].datetime;
                        html += `<tr>
                                    <td>` + (i + 1) + `</td>
                                    <td> ` + date__.slice(6,8) + `-`  + date__.slice(4,6) + `-` + date__.slice(0, 4) + ` </td>
                                    <td> ` + areas[i].description + ` </td>
                                    <td> ` + areas[i].params[6].times[0].name + ` </td>
                                </tr>`;
                    } else {
                        let dete = new Date();
                        let tahun = dete.getFullYear();
                        let bulan = dete.getMonth();
                        let tgl = dete.getDate();
                        let jam = dete.getHours();
                        let minutes = dete.getMinutes();

                        date__ = tahun + bulan + tgl + jam+minutes;
                    }

                    i++;
                }
                while(i < areas.length)
                html +=  `</tbody></table>`;
                $("#load_data").append(html);

            },
            error: (error) => {
                console.log(error)
            }


        }

        $.ajax(request)


    })(jQuery);

</script>

<script type="text/javascript">

    (($) => {

        var settings = {
        "url": "<?php echo esc_url($url_req_2); ?>",
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        let data = response.data;
        let html = '';
        if(response.success === true) {
            html = `Telah terjadi gempa di ` +data.dirasakan+ `<br />` + data.wilayah + `<br />` + data.potensi
            html += `<table class="mt-1 table border-0">

                <tbody class="border-0">
                    <tr class="border-0">
                        <th class="border-0 w-50" scope="col">Tanggal</th>
                        <td class="border-0">` +data.tanggal+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0 w-50" scope="col">Jam</th>
                        <td class="border-0">` +data.jam+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0 w-50" scope="col">Coordinates</th>
                        <td class="border-0">` +data.coordinates+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0" scope="col">Lintang</th>
                        <td class="border-0">` +data.lintang+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0" scope="col">Bujur</th>
                        <td class="border-0">` +data.bujur+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0" scope="col">Magnitude</th>
                        <td class="border-0">` +data.magnitude+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0" scope="col">Kedalaman</th>
                        <td class="border-0">` +data.kedalaman+ `</td>
                    </tr>
                    <tr>
                        <th class="border-0" scope="col">Dirasakan</th>
                        <td class="border-0">` +data.dirasakan+ `</td>

                    </tr>
                    <tr>
                        <td class="border-0" align="center" colspan="2">
                            <img src="` +data.shakemap+ `" style="max-width:300px;margin:auto;"" />
                        </td>
                    </tr>

                </tbody>
                </table>`;
            } else {
                html = `<span class="fw-3 text-center">Mohon maaf untuk saat ini data tidak dapat di akses atau dalam posisi maintenance</span>`
            }

            $("#getData").append(html);

        });

    })(jQuery)

</script>
