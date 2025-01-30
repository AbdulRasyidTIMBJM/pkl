<?php
if (!function_exists('get_user_image')) {
    function get_user_image()
    {
        $CI = &get_instance();
        $img = $CI->session->userdata('img');
        if ($img && file_exists(FCPATH . 'uploads/' . $img)) {
            return base_url('uploads/' . $img);
        } else {
            return base_url('assets/dist/img/profile.jpg');
        }
    }
}


// <?php
// if (!function_exists('get_user_image')) {
//     function get_user_image()
//     {
//         $CI = &get_instance(); // Dapatkan instance CI
//         $CI->load->database(); // Load database

//         // Ambil session img
//         $img = $CI->session->userdata('img');
//         if ($img) {
//             // Jika img ada di session
//             return base_url('assets/dist/img/' . $img); // Ganti path sesuai lokasi penyimpanan
//         } else {
//             // Default image jika tidak ada img di session
//             return base_url('assets/dist/img/profile.jpg');
//         }
//     }
// }
