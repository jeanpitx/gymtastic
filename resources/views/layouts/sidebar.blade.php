<div class="sidebar">
    <div class="px-1 py-1" style="position: absolute; width:100%;  height: auto; margin-top: 2px !important;">
        <input id="filtermenu" type="search" class="form-control"  placeholder="Buscar opción" autocomplete="off"
                            onkeyup="myFunction()">
    </div>
    <nav class="sidebar-nav mt-5">
        <ul class="nav" id="ulmenu">
            @include('layouts.menu')
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("filtermenu");
        filter = input.value.toUpperCase();
        ul = document.getElementById("ulmenu");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue.toUpperCase().indexOf("INICIO")>-1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    $('input[type="search" i]').click(function(){
        $("#filtermenu").val("");
        myFunction();
    });
</script>