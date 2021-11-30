
<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="donor-dashboard.php"><i class="icofont-dashboard"></i> Dashboard</a></li>
				<li><a href="find-donor.php"><i class="icofont-people"></i>Find a Donor </a></li>
				<li><a href="find-recipient.php"><i class="icofont-ui-contact-list"></i> Find a Recipient</a></li>
				<li><a href="send-request.php"><i class="icofont-ui-contact-list"></i> Request Blood</a></li>
				<li><a href="nearest-bloodbank.php"><i class="icofont-contacts"></i>Find Blood Banks</a></li>
				<li><a href="find-camps.php"><i class="icofont-contacts"></i>Find Donation Campaigns</a></li>
				<li><a href="post-camps.php"><i class="icofont-contact-add"></i>Post Donation Campaigns</a></li>
			
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