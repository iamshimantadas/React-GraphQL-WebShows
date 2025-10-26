import React, { useState } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import parse from 'html-react-parser';
import axiosInstance from "../Auth/Axios";
import { useEffect } from "react";
import { Link } from "react-router-dom";


export const TeamTab = () => {

    const [data, setData] = useState({});
    const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
    const no_image_url = "src/assets/images/no_image.jpg";
    const [activeTab, setActiveTab] = useState("articles");
    const settings = {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            }
        ]
    };

    useEffect(() => {
        // hero section render
        const fetchData = async () => {
            const response = await axiosInstance({
                url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/posts-post?populate=*`,
                method: 'GET',
            });
            setData(response.data.data);
        }
        fetchData();
    }, [])

    return (
        <>
            <section className="team-tab-section padding-common light-bg">
                <div className="container">
                    <div className="tab-wraper">
                        {/* Tabs */}
                        <div className="tab-button-wrap mb-50">
                            <ul className="nav nav-tabs justify-content-center">
                                <li className="nav-item">
                                    <button
                                        className={`nav-link ${activeTab === "articles" ? "active" : ""}`}
                                        onClick={() => setActiveTab("articles")}
                                    >
                                        Articles
                                    </button>
                                </li>
                                <li className="nav-item">
                                    <button
                                        className={`nav-link ${activeTab === "podcasts" ? "active" : ""}`}
                                        onClick={() => setActiveTab("podcasts")}
                                    >
                                        Podcasts
                                    </button>
                                </li>
                                <li className="nav-item">
                                    <button
                                        className={`nav-link ${activeTab === "videos" ? "active" : ""}`}
                                        onClick={() => setActiveTab("videos")}
                                    >
                                        Videos
                                    </button>
                                </li>
                            </ul>
                        </div>

                        {/* Tab Content */}
                        <div className="tab-content">
                            {/* Articles */}
                            {activeTab === "articles" && (
                                <div className="tab-slider-wraper">
                                    <div className="tab-title text-center mb-50">
                                        <h2>Latest Articles</h2>
                                    </div>
                                    <Slider {...settings}>

                                        {data.length ? data.map((x, y) => {
                                            if (x.category.slug == "article") {
                                                return (
                                                    <div className="slider-col">
                                                        <div className="card-box">
                                                            <div className="card-image image-adjustment">
                                                                <img src={x?.Featured_Image?.url ? (strapi_url + x.Featured_Image.url) : no_image_url} alt="" />
                                                            </div>
                                                            <div className="card-title mb-50">
                                                                <h3>{x?.Title ? x.Title : ''}</h3>
                                                            </div>
                                                            <div className="card-info">
                                                                <p>
                                                                    {x?.Description ? parse(x.Description) : ''}
                                                                </p>
                                                            </div>
                                                            <div className="card-button">
                                                                <Link to={"/post/" + x.slug} class="button__primary"><span>Read More</span></Link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                )
                                            }
                                        }) : ''}

                                    </Slider>
                                </div>
                            )}

                            {/* Podcasts */}
                            {activeTab === "podcasts" && (
                                <div className="tab-slider-wraper">
                                    <div className="tab-title text-center mb-50">
                                        <h2>Latest Podcasts</h2>
                                    </div>
                                    <Slider {...settings}>

                                        {data.length ? data.map((x, y) => {
                                            if (x.category.slug == "podcast") {
                                                return (
                                                    <div className="slider-col">
                                                        <div className="card-box">
                                                            <div className="card-image image-adjustment">
                                                                <img src={x?.Featured_Image?.url ? (strapi_url + x.Featured_Image.url) : no_image_url} alt="" />
                                                            </div>
                                                            <div className="card-title mb-50">
                                                                <h3>{x?.Title ? x.Title : ''}</h3>
                                                            </div>
                                                            <div className="card-info">
                                                                <p>
                                                                    {x?.Description ? parse(x.Description) : ''}
                                                                </p>
                                                            </div>
                                                            <div className="card-button">
                                                                <Link to={"/post/" + x.slug} class="button__primary"><span>Read More</span></Link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                )
                                            }
                                        }) : ''}

                                    </Slider>
                                </div>
                            )}

                            {/* Videos */}
                            {activeTab === "videos" && (
                                <div className="tab-slider-wraper">
                                    <div className="tab-title text-center mb-50">
                                        <h2>Latest Videos</h2>
                                    </div>
                                    <Slider {...settings}>

                                        {data.length ? data.map((x, y) => {
                                            if (x.category.slug == "video") {
                                                return (
                                                    <div className="slider-col">
                                                        <div className="card-box">
                                                                {x?.Featured_Video?.url ?
                                                                <>
                                                                    <div class="ratio ratio-16x9">
                                                                        <video width="auto" controls>
                                                                            <source src={x?.Featured_Video?.url ? (strapi_url + x.Featured_Video.url) : no_image_url} type="video/mp4" />
                                                                            <source src="mov_bbb.ogg" type="video/ogg" />
                                                                            Your browser does not support HTML video.
                                                                        </video>
                                                                    </div>
                                                                </> : <>
                                                                    <div className="card-image image-adjustment">
                                                                        <img src={x?.Featured_Image?.url ? (strapi_url + x.Featured_Image.url) : no_image_url} alt="" />
                                                                    </div>
                                                                </>}
                                                            <div className="card-title mb-50">
                                                                <h3>{x?.Title ? x.Title : ''}</h3>
                                                            </div>
                                                            <div className="card-info">
                                                                <p>
                                                                    {x?.Description ? parse(x.Description) : ''}
                                                                </p>
                                                            </div>
                                                            <div className="card-button">
                                                                <Link to={"/post/" + x.slug} class="button__primary"><span>Read More</span></Link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                )
                                            }
                                        }) : ''}

                                    </Slider>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </section>
        </>
    )
}
