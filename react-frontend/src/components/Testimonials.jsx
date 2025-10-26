import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import parse from "html-react-parser";
import { LeftArrow } from "./slider-arrows/LeftArrow";
import { RightArrow } from "./slider-arrows/RightArrow";

export const Testimonials = ({ data }) => {


    const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
    const no_image_url = "src/assets/images/no_image.jpg";

    const settings = {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        // arrows: true, // enable arrows
        prevArrow: <LeftArrow />,
        nextArrow: <RightArrow />,
        responsive: [
            {
                breakpoint: 420,
                settings: {
                    centerMode: false,
                },
            },
        ],
    };


    return (
        <>
            {data?.Testimonials?.Client_Reviews?.length > 0 && (
                <Slider {...settings} className="testimonial-slider">
                    {data.Testimonials.Client_Reviews.map((x, y) => (
                        <div className="slider-col" key={`testimonial-${y}`}>
                            <div className="testimonial-box">
                                <div className="row">
                                    <div className="col-md-6">
                                        <div className="review-wraper">
                                            <div className="logo-wrap">
                                                <img
                                                    src={
                                                        x?.Company_Logo?.url
                                                            ? strapi_url + x.Company_Logo.url
                                                            : no_image_url
                                                    }
                                                    alt=""
                                                />
                                            </div>
                                            <div className="profile-info">
                                                <h3>{x?.Client ? parse(x.Client) : ""}</h3>
                                                <p>
                                                    {x?.Client_Designation
                                                        ? parse(x.Client_Designation)
                                                        : ""}
                                                </p>
                                            </div>
                                            <p>{x?.Feedback ? parse(x.Feedback) : ""}</p>
                                        </div>
                                    </div>
                                    <div className="col-md-6">
                                        <div className="image-wraper image-adjustment">
                                            <img
                                                src={
                                                    x?.Client_Profile?.url
                                                        ? strapi_url + x.Client_Profile.url
                                                        : no_image_url
                                                }
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </Slider>
            )}
        </>
    );

}
