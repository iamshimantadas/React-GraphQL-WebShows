import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import parse from "html-react-parser";


export const HeroSlider = ({ data }) => {
    const settings = {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: "0px",
        infinite: true,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 10000,
        cssEase: "linear"
    };

    return (
        <>
            {data?.Hero_Section?.Slider?.length > 0 && (
                <Slider {...settings} className="marquee-slider">
                    {data.Hero_Section.Slider.map((x) => (
                        <div className="slider-wraper" key={"slide-" + x.id}>
                            <div className="slider-col">
                                <div className="title">
                                    <p>{parse(x.Text)}</p>
                                </div>
                            </div>
                        </div>
                    ))}
                </Slider>
            )}
        </>
    );
}
