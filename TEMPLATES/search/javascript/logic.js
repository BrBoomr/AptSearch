imagesInSlides = $(".imageInSlide")
for (i = 0; i < imagesInSlides.length; i++) { 
    //console.log(i + ": " + $(imagesInSlides).eq(i).attr('src'))
    
    $("<img/>") //make a new image tag
    .attr("src", $(imagesInSlides).eq(i).attr("src")) //only copy over the source of our value
    .on('load', function() {
        //grab size of image from memory
        width = this.width;  
        height = this.height; 

        //set the size of each image by initially stretching
        $(imagesInSlides).eq(i).css('height', '100%')
        $(imagesInSlides).eq(i).css('width', '100%')

        //correct the image stretch if needed
        if(width != height){
            if(height > width){
                console.log("height larger")
               $(imagesInSlides).eq(i).css('width', 'auto')
            }
            else{
                console.log("width larger")
               $(imagesInSlides).eq(i).css('height', 'auto')
            }
        }
    })
}



/*
$( document ).ready(function() {
    imagesSource = $(".imageSource")
imagesInCarousel = $(".imageInCarousel")
imagesInThumbnail = $(".imagesInThumbnail")
$.each(imagesSource, function( index, value ) {
    console.log("hey")
    console.log($(value).naturalWidth)
    console.log($(value).naturalHeight)
    
    height = $(images[index]).outerHeight()
    width = $(images[index]).outerWidth()

    $(images[index]).css('height', '100%')
    $(images[index]).css('width', '100%')
    if(height != width){
        if(height > width){
            console.log("height larger")
            $(images[index]).css('width', 'auto')
        }
        else{
            console.log("width larger")
            $(images[index]).css('height', 'auto')
        }
    }
    
});
});
*/
