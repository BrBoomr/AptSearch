//-------------------------Connections-------------------------

var userName = ".userName"
var userEmail = ".userEmail"
var userPhones = ".userPhones"

//-------------------------Logic-------------------------


$(document).ready(function() {

});


//-------------------------Objects-------------------------
//NOTE: these should not contain anything with an ID since objects are intended for duplication

var phoneTitle = 
`
<li class="list-group-item list-group-item-dark">
    <span class="fas fa-phone"></span> Phone Numbers
</li>
`

var phoneNumber = 
`
<li class="list-group-item">
    Work | (956) 789-2342 ext 345 //example format
</li>
`
























var card = `
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <div class="card">
        <div class="card-header">
            <div class="row mainRow">
                <div class="col-md-auto">
                    <div class="carousel slide carouselExampleIndicators" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target=".carouselExampleIndicators" data-slide-to="0" class="active">
                                <img class="d-block w-100 imageInThumbnail" src="https://d3icht40s6fxmd.cloudfront.net/sites/default/files/test-product-test.png" alt="First slide">
                            </li>
                            <li data-target=".carouselExampleIndicators" data-slide-to="1">
                                <img class="d-block w-100 imageInThumbnail" src="https://blog.xenproject.org/wp-content/uploads/2014/10/Testing.jpg" alt="Second slide">
                            </li>
                            <li data-target=".carouselExampleIndicators" data-slide-to="2">
                                <img class="d-block w-100 imageInThumbnail" src="https://www.gettyimages.com/gi-resources/images/CreativeLandingPage/HP_Sept_24_2018/CR3_GettyImages-159018836.jpg" alt="Third slide">
                            </li>
                            <li data-target=".carouselExampleIndicators" data-slide-to="3">
                                <img class="d-block w-100 imageInThumbnail" src="http://1.bp.blogspot.com/-hNC-oT6f-fY/TeXxO26yjvI/AAAAAAAAAOY/qfkOqdKkBi8/s1600/platon-photographer-putin-man-of-the-year-portrait.jpg" alt="Third slide">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block imageInSlide" src="https://d3icht40s6fxmd.cloudfront.net/sites/default/files/test-product-test.png" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carouselCaptionTitle">The Beautiful Pool</h5>
                                    <br>
                                    <p class="carouselCaptionDate">uploaded: 12/4/16</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block imageInSlide" src="https://blog.xenproject.org/wp-content/uploads/2014/10/Testing.jpg" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carouselCaptionTitle">title 2</h5>
                                    <br>
                                    <p class="carouselCaptionDate">other</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block imageInSlide" src="https://www.gettyimages.com/gi-resources/images/CreativeLandingPage/HP_Sept_24_2018/CR3_GettyImages-159018836.jpg" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carouselCaptionTitle">title 3</h5>
                                    <br>
                                    <p class="carouselCaptionDate">other</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block imageInSlide" src="http://1.bp.blogspot.com/-hNC-oT6f-fY/TeXxO26yjvI/AAAAAAAAAOY/qfkOqdKkBi8/s1600/platon-photographer-putin-man-of-the-year-portrait.jpg" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="carouselCaptionTitle">title 4</h5>
                                    <br>
                                    <p class="carouselCaptionDate">other</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-controls carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-controls carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <h1>Beautiful Apartment In The Best Community in LA</h1>
                    <h5>Apt 3A | 101 Grover Rd | Edinburg, Texas | United States, America | 78342</h5>
                    <p>posted: 11/27/18 | updated: 11/29/18</p>
                    <br>
                    <h5>This apartment has everything you would expect and more, the neighboors and friendly, the schools are great and traffic is minimal!</h5>
                    <br>
                    <h4>1000 sqrft | 3 bed | 2 bath</h4>
                    <br>
                    <h2>$650</h2>
                    <br>
                    <form action="{{ base_url() }}/authentication">
                        <button type="submit" class="btn btn-default btn-sm btn-primary">
                            More Details <span class="fas fa-chevron-down margin-left: 15px;"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-lg m-3 ownerName">
                    <span class="fas fa-user"></span> Jefferson Lint
                </div>
                <div class="col-lg m-3 ownerEmail">
                    <span class="fas fa-envelope"></span> jeffIsLinty@weirdo.com
                </div>
                <div class="col-lg m-3 ownerPhones">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-dark"><span class="fas fa-phone"></span> Phone Numbers</li>
                        <li class="list-group-item">Work | (956) 789-2342 ext 345</li>
                        <li class="list-group-item">Home | (956) 789-2342</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
`