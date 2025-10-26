import { Header } from "../components/Header"
import { Footer } from "../components/Footer"
import axios from "../Auth/Axios"
import { useEffect, useState } from "react"
import parse from 'html-react-parser';
import { HeroSlider } from "../components/HeroSlider";
import { Testimonials } from "../components/Testimonials";
import { gql } from "@apollo/client";
import { useQuery } from "@apollo/client/react";

export const Home = () => {

    const no_image_url = "noimage.jpg";
   
    const GET_LOCATIONS = gql`
        query NewQuery {
        page(id: "6", idType: DATABASE_ID) {
            title
            uri
            homePage {
                bannerTitle
                bannerImage {
                    node {
                        sourceUrl
                    }
                }
                bannerLightingImage {
                    node {
                        sourceUrl
                    }
                }
                bannerSliderOptions {
                    bannerSliderOptionsOptionName
                }
                aboutUsSecSectionTitle
                aboutUsSecDescription
                aboutUsSecButtonTitle
                aboutUsSecButtonUrl {
                    url
                }
                whyChooseSecSectionTitle
                whyChooseSecShortDescription
                whyChooseSecButtonTitle
                whyChooseSecButtonUrl {
                    url
                }
                whyChooseSecBoxes {
                    whyChooseSecBoxesProcessTitle
                    whyChooseSecBoxesProcessImage {
                        node {
                            sourceUrl
                        }
                    }
                }
                processSecSectionTitle
                processSecOptions {
                    processSecOptionsProcesssName
                }
                processBoxes {
                    processBoxesStatusText
                    processBoxesTime
                }
                investmentSecSectionTitle
                investmentSecButtonTitle
                investmentSecButtonUrl {
                    url
                }
                investmentSecBoxes {
                    investmentSecBoxesTitle
                    investmentSecBoxesImage {
                        node {
                            sourceUrl
                        }
                    }
                    investmentSecBoxesOptions
                }
                whoWeHelpSecTitle
                whoWeHelpSecDescription
                whoWeHelpSecButtonTitle
                whoWeHelpSecButtonUrl {
                    url
                }
                whoWeHelpSecHelpBoxes {
                    whoWeHelpSecHelpBoxesTitle
                    whoWeHelpSecHelpBoxesShortDescription
                }
                testimonialSecTitle
                testimonialSecFeedbacks {
                    testimonialSecFeedbacksClientsName
                    testimonialSecFeedbacksClientsFeedback
                    testimonialSecFeedbacksDesignation
                    testimonialSecFeedbacksCompanyLogo {
                        node {
                            sourceUrl
                        }
                    }
                    testimonialSecFeedbacksClientsProfileImage {
                        node {
                            sourceUrl
                        }
                    }
                }
            }
        }
    }
    `;

    const { loading, error, data } = useQuery(GET_LOCATIONS);
    if (loading) return <p>Loading...</p>;
    if (error) return <p>Error : {error.message}</p>;


    return (
        <>
            <Header />


            <main>

                
                
            </main >

            <Footer />
        </>
    )
}
