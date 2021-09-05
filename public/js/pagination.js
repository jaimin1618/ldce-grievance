var pagination = {
    count:0,
    limit:10,
    targetId:'my_pagination',
    maxBtn:3,
    pages:1,
    current:1,
    start:1,
    end:1,
    back_btn_disabled:true,
    next_btn_disabled:true,
    onClick:function(id){},
    initialize:function(count,onclick = (id)=>{},targetId,limit=10){
        pagination.count = count;
        pagination.limit = limit;
        pagination.targetId = targetId;
        pagination.onClick = (id)=>{
            this.current = id;
            onclick(id);
            pagination.create(pagination.start);
        }
        pagination.pages = Math.ceil(pagination.count/pagination.limit);
        pagination.create(pagination.start);
    },
    create_container:function(){
        var pagination_container = ""
        pagination_container += '<div class="pagination-container">'
        pagination_container +=    '<div class="pagination-box">'
        pagination_container +=        '<span>page '+pagination.current+' </span>'
        pagination_container +=        '<span> | total pages '+pagination.pages+'</span>'
        pagination_container +=    '</div>'
        pagination_container +=    '<div class="pagination-box">'
        pagination_container +=        '<span>Total Records '+pagination.count+' </span>'
        pagination_container +=    '</div>'
        pagination_container +=    '<div class="pagination-box">'
        pagination_container +=        '<div class="pagination-button-area">'

       if(pagination.back_btn_disabled==true){
            pagination_container +=            '<button class="back-btn" disabled>'
            pagination_container +=                '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">'
            pagination_container +=                    '<path d="M12.7092 0.99999C12.8955 1.18735 13 1.4408 13 1.70499C13 1.96918 12.8955 2.22263 12.7092 2.40999L9.16921 5.99999L12.7092 9.53999C12.8955 9.72735 13 9.9808 13 10.245C13 10.5092 12.8955 10.7626 12.7092 10.95C12.6162 11.0437 12.5056 11.1181 12.3838 11.1689C12.2619 11.2197 12.1312 11.2458 11.9992 11.2458C11.8672 11.2458 11.7365 11.2197 11.6146 11.1689C11.4928 11.1181 11.3822 11.0437 11.2892 10.95L7.04921 6.70999C6.95548 6.61703 6.88109 6.50643 6.83032 6.38457C6.77955 6.26271 6.75341 6.132 6.75341 5.99999C6.75341 5.86798 6.77955 5.73727 6.83032 5.61541C6.88109 5.49355 6.95548 5.38295 7.04921 5.28999L11.2892 0.99999C11.3822 0.906262 11.4928 0.831868 11.6146 0.781099C11.7365 0.73033 11.8672 0.704191 11.9992 0.704191C12.1312 0.704191 12.2619 0.73033 12.3838 0.781099C12.5056 0.831868 12.6162 0.906262 12.7092 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                     '<path d="M6.58811 0.99999C6.77437 1.18735 6.87891 1.4408 6.87891 1.70499C6.87891 1.96918 6.77437 2.22263 6.58811 2.40999L3.04811 5.99999L6.58811 9.53999C6.77436 9.72735 6.87891 9.9808 6.87891 10.245C6.87891 10.5092 6.77436 10.7626 6.58811 10.95C6.49515 11.0437 6.38455 11.1181 6.26269 11.1689C6.14083 11.2197 6.01013 11.2458 5.87811 11.2458C5.7461 11.2458 5.6154 11.2197 5.49354 11.1689C5.37168 11.1181 5.26108 11.0437 5.16811 10.95L0.928114 6.70999C0.834386 6.61703 0.759992 6.50643 0.709223 6.38457C0.658454 6.26271 0.632316 6.132 0.632316 5.99999C0.632316 5.86798 0.658454 5.73727 0.709223 5.61541C0.759992 5.49355 0.834386 5.38295 0.928114 5.28999L5.16811 0.99999C5.26108 0.906262 5.37168 0.831868 5.49354 0.781099C5.6154 0.73033 5.7461 0.704191 5.87811 0.704191C6.01013 0.704191 6.14083 0.73033 6.26269 0.781099C6.38455 0.831868 6.49515 0.906262 6.58811 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                 '</svg>'
            pagination_container +=             '</button>'
       }else{
            pagination_container +=            '<button class="back-btn" onclick="pagination.previous()">'
            pagination_container +=                '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">'
            pagination_container +=                    '<path d="M12.7092 0.99999C12.8955 1.18735 13 1.4408 13 1.70499C13 1.96918 12.8955 2.22263 12.7092 2.40999L9.16921 5.99999L12.7092 9.53999C12.8955 9.72735 13 9.9808 13 10.245C13 10.5092 12.8955 10.7626 12.7092 10.95C12.6162 11.0437 12.5056 11.1181 12.3838 11.1689C12.2619 11.2197 12.1312 11.2458 11.9992 11.2458C11.8672 11.2458 11.7365 11.2197 11.6146 11.1689C11.4928 11.1181 11.3822 11.0437 11.2892 10.95L7.04921 6.70999C6.95548 6.61703 6.88109 6.50643 6.83032 6.38457C6.77955 6.26271 6.75341 6.132 6.75341 5.99999C6.75341 5.86798 6.77955 5.73727 6.83032 5.61541C6.88109 5.49355 6.95548 5.38295 7.04921 5.28999L11.2892 0.99999C11.3822 0.906262 11.4928 0.831868 11.6146 0.781099C11.7365 0.73033 11.8672 0.704191 11.9992 0.704191C12.1312 0.704191 12.2619 0.73033 12.3838 0.781099C12.5056 0.831868 12.6162 0.906262 12.7092 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                     '<path d="M6.58811 0.99999C6.77437 1.18735 6.87891 1.4408 6.87891 1.70499C6.87891 1.96918 6.77437 2.22263 6.58811 2.40999L3.04811 5.99999L6.58811 9.53999C6.77436 9.72735 6.87891 9.9808 6.87891 10.245C6.87891 10.5092 6.77436 10.7626 6.58811 10.95C6.49515 11.0437 6.38455 11.1181 6.26269 11.1689C6.14083 11.2197 6.01013 11.2458 5.87811 11.2458C5.7461 11.2458 5.6154 11.2197 5.49354 11.1689C5.37168 11.1181 5.26108 11.0437 5.16811 10.95L0.928114 6.70999C0.834386 6.61703 0.759992 6.50643 0.709223 6.38457C0.658454 6.26271 0.632316 6.132 0.632316 5.99999C0.632316 5.86798 0.658454 5.73727 0.709223 5.61541C0.759992 5.49355 0.834386 5.38295 0.928114 5.28999L5.16811 0.99999C5.26108 0.906262 5.37168 0.831868 5.49354 0.781099C5.6154 0.73033 5.7461 0.704191 5.87811 0.704191C6.01013 0.704191 6.14083 0.73033 6.26269 0.781099C6.38455 0.831868 6.49515 0.906262 6.58811 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                 '</svg>'
            pagination_container +=             '</button>'
       }
        


        for(let i=pagination.start;i<pagination.end;i++){
            if(pagination.current==i){
                pagination_container +=             '<button class="pagination-btn active" onclick="pagination.onClick('+i+')">'+i+'</button>'
            }else{
                pagination_container +=             '<button class="pagination-btn" onclick="pagination.onClick('+i+')">'+i+'</button>'
            }
            
        }
        

        if(pagination.next_btn_disabled==true){
            pagination_container +=             '<button class="next-btn" disabled>'
            pagination_container +=                 '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">'
            pagination_container +=                     '<path d="M0.290792 0.99999C0.104541 1.18735 -4.28589e-07 1.4408 -4.17042e-07 1.70499C-4.05494e-07 1.96918 0.104541 2.22263 0.290792 2.40999L3.83079 5.99999L0.290792 9.53999C0.104541 9.72735 -5.52942e-08 9.9808 -4.37463e-08 10.245C-3.21984e-08 10.5092 0.104542 10.7626 0.290792 10.95C0.383755 11.0437 0.494356 11.1181 0.616216 11.1689C0.738075 11.2197 0.868781 11.2458 1.00079 11.2458C1.1328 11.2458 1.26351 11.2197 1.38537 11.1689C1.50723 11.1181 1.61783 11.0437 1.71079 10.95L5.95079 6.70999C6.04452 6.61703 6.11891 6.50643 6.16968 6.38457C6.22045 6.26271 6.24659 6.132 6.24659 5.99999C6.24659 5.86798 6.22045 5.73727 6.16968 5.61541C6.11891 5.49355 6.04452 5.38295 5.95079 5.28999L1.71079 0.99999C1.61783 0.906262 1.50723 0.831868 1.38537 0.781099C1.26351 0.73033 1.1328 0.704191 1.00079 0.704191C0.86878 0.704191 0.738074 0.73033 0.616215 0.781099C0.494356 0.831868 0.383755 0.906262 0.290792 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                     '<path d="M6.41189 0.99999C6.22563 1.18735 6.12109 1.4408 6.12109 1.70499C6.12109 1.96918 6.22563 2.22263 6.41189 2.40999L9.95189 5.99999L6.41189 9.53999C6.22564 9.72735 6.12109 9.9808 6.12109 10.245C6.12109 10.5092 6.22564 10.7626 6.41189 10.95C6.50485 11.0437 6.61545 11.1181 6.73731 11.1689C6.85917 11.2197 6.98987 11.2458 7.12189 11.2458C7.2539 11.2458 7.3846 11.2197 7.50646 11.1689C7.62832 11.1181 7.73892 11.0437 7.83189 10.95L12.0719 6.70999C12.1656 6.61703 12.24 6.50643 12.2908 6.38457C12.3415 6.26271 12.3677 6.132 12.3677 5.99999C12.3677 5.86798 12.3415 5.73727 12.2908 5.61541C12.24 5.49355 12.1656 5.38295 12.0719 5.28999L7.83189 0.99999C7.73892 0.906262 7.62832 0.831868 7.50646 0.781099C7.3846 0.73033 7.2539 0.704191 7.12189 0.704191C6.98987 0.704191 6.85917 0.73033 6.73731 0.781099C6.61545 0.831868 6.50485 0.906262 6.41189 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                 '</svg>'
            pagination_container +=             '</button>'
        }else{
            pagination_container +=             '<button class="next-btn" onclick="pagination.next()">'
            pagination_container +=                 '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">'
            pagination_container +=                     '<path d="M0.290792 0.99999C0.104541 1.18735 -4.28589e-07 1.4408 -4.17042e-07 1.70499C-4.05494e-07 1.96918 0.104541 2.22263 0.290792 2.40999L3.83079 5.99999L0.290792 9.53999C0.104541 9.72735 -5.52942e-08 9.9808 -4.37463e-08 10.245C-3.21984e-08 10.5092 0.104542 10.7626 0.290792 10.95C0.383755 11.0437 0.494356 11.1181 0.616216 11.1689C0.738075 11.2197 0.868781 11.2458 1.00079 11.2458C1.1328 11.2458 1.26351 11.2197 1.38537 11.1689C1.50723 11.1181 1.61783 11.0437 1.71079 10.95L5.95079 6.70999C6.04452 6.61703 6.11891 6.50643 6.16968 6.38457C6.22045 6.26271 6.24659 6.132 6.24659 5.99999C6.24659 5.86798 6.22045 5.73727 6.16968 5.61541C6.11891 5.49355 6.04452 5.38295 5.95079 5.28999L1.71079 0.99999C1.61783 0.906262 1.50723 0.831868 1.38537 0.781099C1.26351 0.73033 1.1328 0.704191 1.00079 0.704191C0.86878 0.704191 0.738074 0.73033 0.616215 0.781099C0.494356 0.831868 0.383755 0.906262 0.290792 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                     '<path d="M6.41189 0.99999C6.22563 1.18735 6.12109 1.4408 6.12109 1.70499C6.12109 1.96918 6.22563 2.22263 6.41189 2.40999L9.95189 5.99999L6.41189 9.53999C6.22564 9.72735 6.12109 9.9808 6.12109 10.245C6.12109 10.5092 6.22564 10.7626 6.41189 10.95C6.50485 11.0437 6.61545 11.1181 6.73731 11.1689C6.85917 11.2197 6.98987 11.2458 7.12189 11.2458C7.2539 11.2458 7.3846 11.2197 7.50646 11.1689C7.62832 11.1181 7.73892 11.0437 7.83189 10.95L12.0719 6.70999C12.1656 6.61703 12.24 6.50643 12.2908 6.38457C12.3415 6.26271 12.3677 6.132 12.3677 5.99999C12.3677 5.86798 12.3415 5.73727 12.2908 5.61541C12.24 5.49355 12.1656 5.38295 12.0719 5.28999L7.83189 0.99999C7.73892 0.906262 7.62832 0.831868 7.50646 0.781099C7.3846 0.73033 7.2539 0.704191 7.12189 0.704191C6.98987 0.704191 6.85917 0.73033 6.73731 0.781099C6.61545 0.831868 6.50485 0.906262 6.41189 0.99999Z" fill="#B8B8B9"/>'
            pagination_container +=                 '</svg>'
            pagination_container +=             '</button>'
        }
        
        pagination_container +=         '</div>'
        pagination_container +=     '</div>'
        pagination_container +='</div>'
        document.getElementById(pagination.targetId).innerHTML = pagination_container;
    },
    create:function(start_point){

        pagination.start = start_point;
        if(start_point+pagination.maxBtn>pagination.pages){
            pagination.end = pagination.pages+1;
        }else{
                  
            pagination.end = start_point+pagination.maxBtn;
        }
        if(pagination.end>pagination.pages){
            pagination.next_btn_disabled = true
        }else{
            pagination.next_btn_disabled = false
        }

        if(pagination.start<=1){
            pagination.back_btn_disabled = true
        }else{
            pagination.back_btn_disabled = false
        }
        pagination.create_container();

    },
    next:function(){
        if(pagination.next_btn_disabled!=true){
            pagination.onClick(pagination.end);
            pagination.create(pagination.end);
            
        }
    },
    previous:function(){
        if(pagination.back_btn_disabled!=true){
            pagination.onClick(pagination.start-pagination.maxBtn)
            pagination.create(pagination.start-pagination.maxBtn);
            
        }
    }

}