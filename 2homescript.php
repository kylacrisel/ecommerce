<script>
		var MenuItems = document.getElementById("MenuItems");

		MenuItems.style.maxHeight = "0px";
		function menutoggle(){
			if(MenuItems.style.maxHeight =="0px")
				{
					MenuItems.style.maxHeight = "200px";
				}
				else 
				{
					MenuItems.style.maxHeight = "0px";
				}
		}
		mybutton = document.getElementById("myBtn");

		const to-top =document.querySelector(".toTop");
		window.addEventListener("Scroll,"()=> {
			if(window.pageYoffset>100){
				else{
					to-top.classList.remove("active");
			}
		}
		})   
	</script>
	<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>