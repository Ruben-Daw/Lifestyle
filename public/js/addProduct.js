
for (let i = 34; i < 48; i++) {
    
    document.getElementById('talla'+ i).addEventListener('click', function(e) {
        if(!document.getElementById('talla'+ i).checked)
        {
            document.getElementById('labelStockTalla'+ i).hidden = true;
            document.getElementById('stockTalla'+ i).hidden = true;
            document.getElementById('stockTalla'+ i).required = false;
        }else{
            document.getElementById('labelStockTalla'+ i).hidden = false;
            document.getElementById('stockTalla'+ i).hidden = false;
            document.getElementById('stockTalla'+ i).required = true;
            
        }
    });
    
}

