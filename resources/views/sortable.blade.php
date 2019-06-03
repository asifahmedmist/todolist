<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
 <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<style>
#dragdrop .well{padding: 8px; border: 0; background: #e0e0e0; }
#dragdrop .well .header{ color: #000; font-size: 14px; font-weight: bold; margin-bottom: 6px;}
#dragdrop .well .subheader{ color: #969696; font-size: 12px; padding: 8px; border-bottom: 1px solid #ccc; background: #fff; -webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 2px;
-moz-border-radius-topleft: 2px;
-moz-border-radius-topright: 2px;
border-top-left-radius: 2px;
border-top-right-radius: 2px;}
#dragdrop .well .subheader .buttonsml{ background: #5bb95b; padding:3px; color: #fff; font-size: 11px; line-height: 9px;}
.draglist-shift{ margin-left: -3%!important; width: 53%!important;}


.sortable-list {
    background-color: #fff;
    list-style: none;
    margin-bottom:10px;
    min-height: 30px;
    padding: 5px;
    
}
.sortable-list:last-child{ margin-bottom: 0;}




.placeholder {
    background-color: Yellow;
    border: 1px dashed #666;
    height: 40px;
    margin-bottom: 5px;
}
.dragbleList{ max-height: 400px; overflow: auto;}
.sortable-item {
    background:#f1f1f1 url(dragListicon.png) 10px 10px no-repeat;   
    cursor: move;
    display: block; 
    margin-bottom: 2px;
    padding: 6px 6px 6px 24px;
    color: #5a5a5a;
    font-size: 12px;
    
}
</style>

 
<h1>Test</h1>
   <div id="sortable-div" class="col-sm-12 col-xs-12 col-md-9 addSub">        
          <div class="padLR10">
          </div>
          <div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">    
            <div class="well clearfix">
             
                  <div class="header">Container 1</div>
                   <div class="dragbleList">
                  <ul class="sortable-list">
                    <li class="sortable-item">Item1</li>
        <li class="sortable-item">Item2</li>    
        <li class="sortable-item">Item3</li>    
        <li class="sortable-item">Item4</li>        
                  </ul>               
            </div>
            </div>    
          </div>
       <div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">    
            <div class="well clearfix">
             
        <div class="header">Container 2</div>
                  <ul class="sortable-list">
                     <li class="sortable-item">Item51</li>
        <li class="sortable-item">Item52</li>   
        <li class="sortable-item">Item53</li>   
        <li class="sortable-item">Item54</li>                  
                  </ul>             
            </div>
            </div> 
 
          <div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">        
            <div id="my-timesheet" class="well clearfix">
                 <div class="header">Container 3</div>
                <ul class="sortable-list">
                  <li class="sortable-item">Item6</li>
        <li class="sortable-item">Item7</li>    
        <li class="sortable-item">Item8</li>    
        <li class="sortable-item">Item9</li>          
                </ul>
              
            </div>  
          </div>        
          </div>

<script type="text/javascript">
$(document).ready(function(){
    // Example 1.3: Sortable and connectable lists with visual helper
      $('#sortable-div .sortable-list').sortable({
       connectWith: '#sortable-div .sortable-list',
        placeholder: 'placeholder',
     });
});
</script>
