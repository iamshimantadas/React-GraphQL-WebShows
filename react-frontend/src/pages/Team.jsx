import { Header } from "../components/Header"
import { Footer } from "../components/Footer"
import { useState, useEffect } from "react";
import axiosInstance from "../Auth/Axios";


export const Team = () => {

  const [data, setData] = useState({});
  const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
  const no_image_url = "src/assets/images/no_image.jpg";

  useEffect(() => {
    const fetchData = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/team-page?populate[0]=Hero.Right_Float_Image&populate[1]=Members.Profile`,
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
        <section class="inner-banner-section light-bg">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-5">
                <div class="info-wraper">
                  <h1>{data?.Hero?.Hero_Section_Text ? data.Hero.Hero_Section_Text : ''}</h1>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="image-outer text-end position-relative">
                  <div class="man-image"><img src={data?.Hero?.Right_Float_Image?.url ? (strapi_url + data.Hero.Right_Float_Image.url) : no_image_url} alt="" /></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="team-section padding-common">
          <div class="container">
            <div class="team-box-outer">
              <div class="row">
                {data?.Members ? data.Members.map((x, y) => {
                  return (
                    <div class="col-xl-3 col-lg-4 col-sm-6 team-box-col" key={"member-"+y}>
                      <div class="team-box">
                        <div class="team-box-image image-adjustment">
                          <img src={x?.Profile?.url ? strapi_url + x.Profile.url : no_image_url} alt="" />
                        </div>
                        <div class="team-box-info">
                          <h4>{ x?.Name ? x.Name : ''}</h4>
                          <p>{ x?.Member_Info ? x.Member_Info : ''}</p>
                        </div>
                      </div>
                    </div>
                  )
                }) : ''}
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </>
  )
}
