<!--ptwall-->

<div id="wrapper" class="container">
  <div id="page" class="row-fluid">
    <div class="span12 wrap">
      <div class="content">
	  <h1 class="hero center">Find a Personal Trainer in your City</h1>
<p class="marketing-byline center">No Gyms, Muscle Cowboys of Health Shakes here 
  </p>
        <form name="test_form" id="additional_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
          <div id="searchMenu" class="span6"><ul id="tabs">Search by: <li><a href="#theLocation">Location</a></li> |  <li><a href="#theName">Name</a></li> |  <li><a href="#theTags">Tag</a></li> </ul></div>
          <!--start smartSearchWrap-->
          <div id="smartSearchWrap" class="span6 clearfix smartSearchWrap" style="display:block;">
            <div class="tab-content smartSearch" id="theLocation" >
              <input id="location" type="text"  onblur="if (this.value == '') {this.value = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;city ...';}" onfocus="if (this.value == '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;city ...') {this.value = '';}" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;city ..." name="search_by_city" class="" />
            </div>
            <div class="tab-content smartSearch" id="theName" style="display:none;">
              <input id="name" type="text"  onblur="if (this.value == '') {this.value = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;last name ...';}" onfocus="if (this.value == '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;last name ...') {this.value = '';}" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;last name ..." name="search_by_name" class="" />
            </div>
            <div class="tab-content smartSearch" id="theTags" style="display:none;">
              <input id="tag" type="text"  onblur="if (this.value == '') {this.value = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tag ...';}" onfocus="if (this.value == '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tag ...') {this.value = '';}" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tag ..." name="search_by_tag" class="" />
            </div>
          </div>
        </form>
        <form name="extra_test_form" id="function_search_form" action="<?php echo base_url(); ?>index.php?c=welcome&m=index" method="post">
          <?php 
			$data = get_location_drops();
			$state_list = $data['state_list'];			
			$county_list = $data['county_list'];
			$sort_options = $data['sort_options'];
			$county_selected = $data['county_selected'];
			$state_selected = $data['state_selected'];
			$hidden_data = $data['hidden_data'];
		  ?>
          <input type="hidden" name="search_by_name_id" id="search_by_name_id" value="" />
          <input type="hidden" name="search_by_location_id" id="search_by_location_id" value="" />
          <input type="hidden" name="search_by_tag_id" id="search_by_tag_id" value="" />
          <input type="hidden" name="country" id="country" value="<?php echo $hidden_data['country'] ?>" />
        </form>
        <script type="text/javascript">
		var options = {
			script:"index.php?c=ajaxcalls&m=get_search&json=true&",
			varname:"input",
			json:true,
			callback: function (obj) { document.getElementById('testid').value = obj.id; 
			
			}
		};
		//var as_json = new AutoSuggest('search_input', options);
		var options_search_name_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_name&",
			minchars: 2,
			varname:"input",
			callback: function (obj) { document.getElementById('search_by_name_id').value = obj.id;;document.getElementById("function_search_form").submit(); }
		};
		
		var options_search_city_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_location&",
			minchars: 2,
			varname:"input",
			timeout:5000,
			callback: function (obj) { document.getElementById('search_by_location_id').value = obj.id;;document.getElementById("function_search_form").submit(); }
		};		
		
		var options_search_tag_xml = {
			script:"index.php?c=ajaxcalls&m=get_search_by_tag&",
			minchars: 2,
			varname:"input",
			callback: function (obj) { document.getElementById('search_by_tag_id').value = obj.id;;document.getElementById("function_search_form").submit(); }
		};
		
		var as_xml = new AutoSuggest('name', options_search_name_xml);
		var as_xml_location = new AutoSuggest('location', options_search_city_xml);
		var as_xml_tag = new AutoSuggest('tag', options_search_tag_xml);
		
	</script>
      </div>
    </div>
  </div>
</div>
<!-- end pageWrapper -->
</div>
