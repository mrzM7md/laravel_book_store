var scrollAmount = -200; // هذا يمكن تعديله للتحكم في مقدار التمرير
    

const arrowsScrollAnimation = (arrow_start_id, arrow_end_id, container_id, scroll_amount) => {
    
    document.getElementById(arrow_start_id).addEventListener('click', function() {
        document.getElementById(container_id).scrollBy({
            // left: -scrollAmount,
            left: scroll_amount,
            behavior: 'smooth'
            });
        });
            
        
        document.getElementById(arrow_end_id).addEventListener('click', function() {
        document.getElementById(container_id).scrollBy({
            // left: scrollAmount,
            left: document.getElementById(container_id).scrollWidth,
            behavior: 'smooth'
            });
        });
}

const flex_hidden_Item = (thisItem, id, withActiveIcon = true) => {
    if(document.getElementById(id).style.display == "flex"){
        document.getElementById(id).style.display = "none";
        if(withActiveIcon){
            document.getElementById(thisItem).classList.remove('nav-icon-active');   
        }
    }
    else{
        document.getElementById(id).style.display = "flex";
        if(withActiveIcon){
            document.getElementById(thisItem).classList.add('nav-icon-active');   
        }
    }
}

const checkInput = (input, itemId) => {
    if(input.value.trim() === ''){
        document.getElementById(itemId).style.display = "none";
    }
    else{
        document.getElementById(itemId).style.display = "block";
    }
}

arrowsScrollAnimation(
    'arrow-scroll-start-most-seller',
    'arrow-scroll-end-most-aeller',
    'most-seller-products-cards', scrollAmount
);

arrowsScrollAnimation(
    'arrow-scroll-start-most-recent',
    'arrow-scroll-end-most-recent',
    'most-recent-products-cards', scrollAmount
);
