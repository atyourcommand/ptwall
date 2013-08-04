<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sitemap
 *
 * @author Mr. Upale
 */
class Sitemap extends Controller {
    //put your code here

    function index() {

       	$query = $this->db->query("SELECT first_name, last_name, county_id, date(joined) as joined from users where approved=1 and active=1");

       // 
       header("Content-Type: text/xml;charset=iso-8859-1");
       echo '<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">';
       
        foreach ($query->result() as $row)
	{
            //print_r($row);

            $url = "http://personaltrainerwall.com/personal-trainer/".trim($row->first_name)."_".trim($row->last_name);
            $name = "".trim($row->first_name)." ".trim($row->last_name);
			$location = "".trim($row->county_id);
			
			echo
            '   <url>
				<name>'.$name.'</name>
				<location>'.$location.'</location>
                <loc>'.$url.'</loc>
                <lastmod>'.$row->joined.'</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
                </url>
            ';
        }

        echo '</urlset>';
    }
}
?>
