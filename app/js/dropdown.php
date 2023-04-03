<script type="text/javascript">
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");

    // Tutup dropdown jika pengguna mengklik di luarnya
    window.onclick = function(event) {
    if (!event.target.matches('#dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
}

    function myFunction_Koperasi(){
      document.getElementById('myDropdowns').classList.toggle('show');

            // Tutup dropdown jika pengguna mengklik di luarnya
            window.onclick = function(event) {
            if (!event.target.matches('#dropbtn-k')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }else{
              if(!event.target.matches("#dropdown-p") == !event.target.matches("#dropdown-g") == !event.target.matches("#dropdown-k")){
                openDropdown.classList.remove('show');
              }
          }
        }
    }

    function myFunction_Perpus(){
            document.getElementById('myDropdownp').classList.toggle('show');

            // Tutup dropdown jika pengguna mengklik di luarnya
            window.onclick = function(event) {
            if (!event.target.matches('#dropbtn-p')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }else{
              if(!event.target.matches("#dropdown-p") == !event.target.matches("#dropdown-g") == !event.target.matches("#dropdown-k")){
                openDropdown.classList.remove('show');
              }
            }
        }
    }

    function myFunction_Data(){
            document.getElementById("myDropdowng").classList.toggle('show');

            // Tutup dropdown jika pengguna mengklik di luarnya
            window.onclick = function(event) {
            if (!event.target.matches('#dropbtn-g')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }else{
              if(!event.target.matches("#dropdown-g") == !event.target.matches("#dropdown-k") == !event.target.matches("#dropdown-p")){
                openDropdown.classList.remove('show');
              }
            }
        }
    }
</script>