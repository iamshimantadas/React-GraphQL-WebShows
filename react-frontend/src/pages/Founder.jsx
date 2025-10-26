import { Header } from "../components/Header"
import { Footer } from "../components/Footer"
import { useState, useEffect } from "react";
import parse from 'html-react-parser';
import axiosInstance from "../Auth/Axios";
import { TeamTab } from "../components/TeamTab";


export const Founder = () => {

  const [data, setData] = useState({});
  const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
  const no_image_url = "src/assets/images/no_image.jpg";

  useEffect(() => {
    // hero section render
    const fetchData = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/founder-page?populate[0]=Hero_Section.Right_Float_Image&populate[1]=Hero_Section.Left_Float_Image&populate[2]=Founder_Information.Profile&populate[3]=Blogs_Section`,
        method: 'GET',
      });
      setData(response.data.data);
    }
    fetchData();
  }, [])


  return (
    <>
      <Header />

      <main>
        <section className="inner-banner-section light-bg">
          <div className="container">
            <div className="row align-items-center">
              <div className="col-lg-6">
                <div className="info-wraper">
                  <h1>{data?.Hero_Section?.Hero_Section_Text ? parse(data.Hero_Section.Hero_Section_Text) : ''}</h1>
                </div>
              </div>
              <div className="col-lg-6">
                <div className="image-outer text-end position-relative">
                  {data?.Hero_Section?.Right_Float_Image?.url ? <>
                    <div className="man-image">
                    <img src={data?.Hero_Section?.Right_Float_Image?.url ? (strapi_url + data.Hero_Section.Right_Float_Image.url) : no_image_url} alt />
                  </div>
                  </> : ''}
                  {data?.Hero_Section?.Left_Float_Image?.url ? <>
                  <div className="element-design banner-lightning">
                    <img src={data?.Hero_Section?.Left_Float_Image?.url ? (strapi_url + data.Hero_Section.Left_Float_Image.url) : no_image_url} alt />
                  </div>
                  </> : ''}
                </div>
              </div>
            </div>
          </div>
        </section>
        <section className="team-about-section padding-common">
          <div className="container">
            <div className="box-design">
              <div className="arrow-wrap">
                <div className="down-arrow right-down-arrow"><img src="/assets/images/down-arrow.png" alt /></div>
                <div className="down-arrow left-down-arrow"><img src="/assets/images/down-arrow-right.png" alt /></div>
              </div>
              <div className="team-about-box text-center">
                <div className="image-wraper">
                  <img src={data?.Founder_Information?.Profile?.url ? (strapi_url + data.Founder_Information.Profile.url) : no_image_url} alt />
                </div>
                <div className="profile-wrap">
                  {data?.Founder_Information?.About_Founder ? parse(data.Founder_Information.About_Founder) : '' }
                </div>
                <div className="profile-description">
                  <p>
                    {data?.Founder_Information?.Short_Description ? data.Founder_Information.Short_Description : ''}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <TeamTab />

      </main>

      <Footer />
    </>
  )
}
