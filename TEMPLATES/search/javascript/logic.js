/*stops the carousel from automatically running*/
$('.carousel').carousel({
    interval: false
}); 

/*
$( document ).ready(function() {
    //grab all of our images that are in the slides
    imagesInSlides = $(".imageInSlide")

    //iterate through the list so the slide container can contain the image properly
    for (i = 0; i < imagesInSlides.length; i++) { 
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
});
*/