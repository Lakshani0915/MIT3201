
<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="hospitals-dashboard.php"><i class="icofont-dashboard"></i> Dashboard</a></li>
				<li><a href="add-blood.php"><i class="icofont-people"></i>Add Blood Stock </a></li>
				<li><a href="request-blood.php"><i class="icofont-ui-contact-list"></i> Request Blood</a></li>
				<li><a href="add-donor.php"><i class="icofont-ui-contact-list"></i> Register Donors</a></li>
				<li><a href="find-donor.php"><i class="icofont-contacts"></i>Find Donors</a></li>
				<li><a href="find-camps.php"><i class="icofont-contacts"></i>Find Donation Campaigns</a></li>
			
			</ul>
		</nav>

	
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>


<!-- 
	 -->