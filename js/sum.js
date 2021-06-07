function sum() {
         var n1 = document.getElementById("num1").value;
         var n2 = document.getElementById("num2").value;
         var out = "<h2>invalid input</h2>";

         if  (!isNaN(parseFloat(n1)) && !isNaN(parseFloat(n2)))  {
            result = parseFloat(n1) + parseFloat(n2);
            out = n1 + " + " + n2 + " = " + result;
         } 
         var obj = document.getElementById("target");
         obj.innerHTML =  out;