        window.onload = function(){
              if ($("#online_sale").length > 0) {//only load click listeners if this element id is on the page loaded
		document.getElementById("date").addEventListener("click", sortByDate);//add click listener to date
 		document.getElementById("rating").addEventListener("click", sortByRating);//add click listener to
		document.getElementById("sales").addEventListener("click", sortBySales);//add click listener to
		document.getElementById("online_sale").addEventListener("click", sortByOnlineSales);//add click listener to
		document.getElementById("type").addEventListener("click", sortByType);//add click listener to               
              }
          };

           function sortByDate(){
              // alert("clicks work");
            }
        
        //clicking the rating table header will sort items by rating level in order. 
        function sortByRating(){
                var sortColumn = 1;
                var tableData = document.getElementById("bookdata").getElementsByTagName('tbody').item(0);
                var rowData = tableData.getElementsByTagName('tr');            
                for(var i = 0; i < rowData.length - 1; i++){
                    for(var j = 0; j < rowData.length - (i + 1); j++){
                        if(Number(rowData.item(j).getElementsByTagName('td').item(sortColumn).innerHTML.replace(/[^0-9\.]+/g, "")) < Number(rowData.item(j+1).getElementsByTagName('td').item(sortColumn).innerHTML.replace(/[^0-9\.]+/g, ""))){
                            tableData.insertBefore(rowData.item(j+1),rowData.item(j));
                        }
                    }
                }
            }
        
        //clicking the sales table header will sort items by most quantity purchased in order. 
        function sortBySales(){
                var sortColumn = 3;
                var tableData = document.getElementById("bookdata").getElementsByTagName('tbody').item(0);
                var rowData = tableData.getElementsByTagName('tr');            
                for(var i = 0; i < rowData.length - 1; i++){
                    for(var j = 0; j < rowData.length - (i + 1); j++){
                        if(Number(rowData.item(j).getElementsByTagName('td').item(sortColumn).innerHTML.replace(/[^0-9\.]+/g, "")) < Number(rowData.item(j+1).getElementsByTagName('td').item(sortColumn).innerHTML.replace(/[^0-9\.]+/g, ""))){
                            tableData.insertBefore(rowData.item(j+1),rowData.item(j));
                        }
                    }
                }
        }
        
        //clicking the online_sales table header will sort items by y/n values in order. 
        function sortByOnlineSales(){
                var sortColumn = 4;
                var tableData = document.getElementById("bookdata").getElementsByTagName('tbody').item(0);
                var rowData = tableData.getElementsByTagName('tr');            
                for(var i = 0; i < rowData.length - 1; i++){
                    for(var j = 0; j < rowData.length - (i + 1); j++){
                            if(Number(rowData.item(j).getElementsByTagName('td').item(sortColumn).innerHTML === 'N')){
                                tableData.insertBefore(rowData.item(j+1),rowData.item(j));
                            }
                        }
                    }
                }
  
        //clicking the type table header will sort items by ebook/paperback values in order. 
        function sortByType(){
           var sortColumn = 4;
                var tableData = document.getElementById("bookdata").getElementsByTagName('tbody').item(0);
                var rowData = tableData.getElementsByTagName('tr');            
                for(var i = 0; i < rowData.length - 1; i++){
                    for(var j = 0; j < rowData.length - (i + 1); j++){
                            if(Number(rowData.item(j).getElementsByTagName('td').item(sortColumn).innerHTML === 'Y')){
                                tableData.insertBefore(rowData.item(j+1),rowData.item(j));
                            }
                        }
                    }
                }
        