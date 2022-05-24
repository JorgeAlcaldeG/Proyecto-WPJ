 function next(Pagina, numPag) {

     if (Pagina < numPag) {
         let newpag = Pagina + 1
         window.location.href = "CrudAdministradoresProf.php?pag=" + newpag;
     }

 }

 function back(Pagina) {

     let newpag = Pagina - 1
     if (newpag > 0) {
         window.location.href = "CrudAdministradoresProf.php?pag=" + newpag;
     }



 }