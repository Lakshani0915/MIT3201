
<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="admin-dashboard.php"><i class="icofont-dashboard"></i> Dashboard</a></li>
					<button class="dropdown-btn"><a href="#">
						<i class="icofont-stylish-down"></i>Users<i class="fa fa-angle-down"></i></a> 
					</button>
					 <div class="dropdown-container">
					   <a href="add-users.php">Add Users</a>
					   <a href="manage-users.php">Manage Users</a>
					 </div>
				
					<button class="dropdown-btn"><a href="#">
						<i class="icofont-stylish-down"></i>Hospitals<i class="fa fa-angle-down"></i></a> 
					</button>
					 <div class="dropdown-container">
					   <a href="add-hospitals.php">Add Hospitals</a>
					   <a href="manage-hospitals.php">Manage Hospitals</a>
					   <a href="bloodstock-requests.php">Blood Stock Requests</a>
					 </div>

				<li><a href="donor-list.php"><i class="icofont-people"></i> Donor List</a></li>
				<li><a href="blood-stock.php"><i class="icofont-people"></i> Blood Stock</a></li>
				<li><a href="manage-conactusquery.php"><i class="icofont-ui-contact-list"></i> Manage Conatctus Query</a></li>
				<!-- <li><a href="add-users.php"><i class="icofont-contact-add"></i> Add User</a></li> -->
				
				<button class="dropdown-btn"><a href="#">
						<i class="icofont-stylish-down"></i>Reports<i class="fa fa-angle-down"></i></a> 
					</button>
					 <div class="dropdown-container">
					    <a href="donor-list.php">Donors</a>
					    <a href="blood-stock.php">Blood quantity</a>
					   <!--  <a href="#">Camps</a>
					    <a href="#">Hospitals</a> -->
					 </div>
				

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