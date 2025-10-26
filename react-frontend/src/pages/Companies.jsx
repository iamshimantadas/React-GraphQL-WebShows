import { Header } from "../components/Header"
import { Footer } from "../components/Footer"
import { useState, useEffect } from "react";
import parse from 'html-react-parser';
import axiosInstance from "../Auth/Axios";
import { Link } from "react-router-dom";

export const Companies = () => {

  const [data, setData] = useState({});
  const [company, setCompany] = useState({});
  const [post_per_page, setPostPerPage] = useState(4);
  const [disable_btn, setDisableBtn] = useState(true);
  const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
  const no_image_url = "src/assets/images/no_image.jpg";

  useEffect(() => {
    // hero section render
    const fetchData = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/companies-page?populate[0]=Hero_Section.Right_Float_Image&populate[1]=Hero_Section.Left_Float_Image&populate[2]=Listing_Section`,
        method: 'GET',
      });
      setData(response.data.data);
    }
    fetchData();

    // fetch companies
    const fetchCompanies = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/companies-list?populate=*`,
        method: 'GET',
      });
      response.data.data.splice(4);
      setCompany(response.data.data);
    }
    fetchCompanies();
  }, [])

  const loadMore = (e) =>{
    e.preventDefault();
    setPostPerPage(post_per_page+post_per_page);
  }

  useEffect(() => {
    const fetchCompanies = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/companies-list?populate=*`,
        method: 'GET',
      });
      if(post_per_page > response.data.data.length){
        setDisableBtn(false);
      }
      response.data.data.splice(post_per_page);
      setCompany(response.data.data);
    }
    fetchCompanies();
  }, [post_per_page])
  

  return (
    <>
      <Header />

      <main>
        <section className="inner-banner-section light-bg">
          <div className="container">
            <div className="row align-items-center">
              <div className="col-lg-5">
                <div className="info-wraper">
                  <h1>{data?.Hero_Section?.Hero_Section_Text ? parse(data.Hero_Section.Hero_Section_Text) : ''}</h1>
                </div>
              </div>
              <div className="col-lg-7">
                <div className="image-outer text-end position-relative">
                  <div className="man-image">
                    <img src={data?.Hero_Section?.Left_Float_Image?.url ? (strapi_url + data.Hero_Section.Left_Float_Image.url) : no_image_url} alt="" />

                  </div>
                  <div className="element-design banner-lightning">
                    <img src={data?.Hero_Section?.Right_Float_Image?.url ? (strapi_url + data.Hero_Section.Right_Float_Image.url) : no_image_url} alt="" />

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section className="company-section padding-common">
          <div className="container">
            <div className="top-row mb-50">
              <div className="row align-items-center">
                <div className="col-lg-6">
                  <div className="title-wrap">
                    <h2>
                      {data?.Listing_Section?.Section_Title ? parse(data.Listing_Section.Section_Title) : ''}
                    </h2>
                  </div>
                </div>
                <div className="col-lg-6">
                  <div className="desc-wrap">
                    <p>
                      {data?.Listing_Section?.Short_Description ? parse(data.Listing_Section.Short_Description) : ''}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div className="company-box-outer">
              <div className="row justify-content-center">
                {company?.length ? company.map((x, y) => {
                  return (
                    <div className="col-lg-4 col-md-6 company-box-col">
                      <div className="company-box position-relative">
                        <div className="company-box-inner position-relative">
                          <div className="icon-outer mb-50">
                            <div className="icon">
                              <img src={x?.Company_Logo?.url ? (strapi_url+x.Company_Logo.url) : no_image_url } alt={x?.Company_Name ? x.Company_Name : ''} />
                            </div>
                          </div>
                          <div className="company-title">
                            <h3>
                              {x?.Company_Name ? parse(x.Company_Name) : ''}
                            </h3>
                          </div>
                          <div className="company-description">
                            <p>
                              {x?.Short_Description ? parse(x.Short_Description) : ''}
                            </p>
                          </div>
                          <div className="company-button">
                            <a href={x?.Website_Link ? parse(x.Website_Link) : ''} target="_blank" className="button__primary">
                              <span>Visit Website</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  )
                }) : ''}

              </div>
              { disable_btn ? <>
                <div className="load-more-button-wrap text-center">
                <button onClick={loadMore} className="button__primary button__primary-fill">
                  <span>Load More</span>
                </button>
              </div>
              </> : '' }
              

            </div>
          </div>
        </section>
      </main>


      <Footer />
    </>
  )
}
