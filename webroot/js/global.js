/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$().ready(function(){
   var users=new Bloodhound(
           {
               datumTokenizer: Bloodhound.tokenizers.obj.whitespace('product_name'),
               queryTokenizer: Bloodhound.tokenizers.whitespace,
               remote: '/Products?wh=%QUERY'
           }
            ); 
    users.initialize();
    $('#search').typeahead(
            {
                hint: true,
                highlight: true,
                minLength:2
            },{
                name: 'products',
                displayKey: 'product_name',
                source: users.ttAdapter()
            });
});