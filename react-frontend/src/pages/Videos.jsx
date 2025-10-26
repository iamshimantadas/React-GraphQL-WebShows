import { Header } from "../components/Header"
import { Footer } from "../components/Footer"
import { useState, useEffect } from "react";
import axiosInstance from "../Auth/Axios";
import { Link } from "react-router-dom";

export const Videos = () => {

  const [data, setData] = useState({});
  const [featured_post, setFeaturedPost] = useState({});
  const [posts, setPosts] = useState({});
  const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
  const no_image_url = "src/assets/images/no_image.jpg";
  const [postnumber, setPostNumber] = useState(2);
  const [disable_btn, setDisableBtn] = useState(true);

  useEffect(() => {

    // hero section render
    const fetchData = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/videos-page?populate[0]=Hero_Section.Right_Float_Image&populate[1]=Hero_Section.Left_Float_Image`,
        method: 'GET',
      });
      setData(response.data.data);
    }
    fetchData();

    // render posts
    const fetchPosts = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/posts-post?filters[$and][0][category][name][$eq]=videos&populate=*`,
        method: 'GET',
      });
      response.data.data.splice(2);
      setPosts(response.data.data);
    }
    fetchPosts();

    // featured post
    const fetchFeaturedPost = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/posts-post?filters[$and][0][category][name][$eq]=videos&populate=*`,
        method: 'GET',
      });
      setFeaturedPost(response.data.data);
    }
    fetchFeaturedPost();

  }, [])

  const loadMore = (e) => {
    e.preventDefault();
    setPostNumber(postnumber + 2);
  }

  useEffect(() => {
    const fetchPosts = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/posts-post?filters[$and][0][category][name][$eq]=videos&populate=*`,
        method: 'GET',
      });
      if (postnumber > response.data.data.length) {
        setDisableBtn(false);
      }
      response.data.data.splice(postnumber);
      setPosts(response.data.data);
    }
    fetchPosts();
  }, [postnumber])

  return (
    <>
      <Header />

      <main>
        
        {data?.Hero_Section?.Hero_Section_Text ? <>
          <section class="inner-banner-section light-bg">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="info-wraper">
                    <h1>{data?.Hero_Section?.Hero_Section_Text ? data.Hero_Section.Hero_Section_Text : ''}</h1>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="image-outer text-end position-relative">
                    <div class="man-image"><img src={data?.Hero_Section?.Right_Float_Image?.url ? (strapi_url + data.Hero_Section.Right_Float_Image.url) : no_image_url} alt="" /></div>
                    <div class="element-design banner-lightning">
                      <img src={data?.Hero_Section?.Left_Float_Image?.url ? (strapi_url + data.Hero_Section.Left_Float_Image.url) : no_image_url} alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </> : ''}

        {featured_post.length ? <>
          <section class="featured-section padding-common">
            <div class="container">
              <div class="section-title">
                <h2>{data?.Featured_Video_Title ? data.Featured_Video_Title : ''}</h2>
              </div>

              {featured_post.length ? featured_post.map((x, y) => {
                if (x.Featured_Post) {
                  return (
                    <div class="row align-items-center">
                      <div class="col-lg-6">
                        {x?.Featured_Video?.url ? <>
                          <div class="ratio ratio-16x9">
                            <video width="auto" controls>
                              <source src={x?.Featured_Video?.url ? (strapi_url + x.Featured_Video.url) : no_image_url} type="video/mp4" />
                              <source src="mov_bbb.ogg" type="video/ogg" />
                              Your browser does not support HTML video.
                            </video>
                          </div>
                        </> :
                          <>
                            <div class="image-wrap image-adjustment">
                              <img src={x?.Featured_Image?.url ? (strapi_url + x.Featured_Image.url) : no_image_url} alt="" />
                            </div>
                          </>}
                      </div>
                      <div class="col-lg-6">
                        <div class="info-wrap">
                          <div class="date-wrap">
                            <p>{x?.createdAt ? new Date(x.createdAt).getDate() + "/" + new Date(x.createdAt).getMonth() + "/" + new Date(x.createdAt).getFullYear() : ''}</p>
                          </div>
                          <h3>{x?.Title ? x.Title : ''}</h3>
                          <p>
                            {x?.Description ? (x.Description.substring(0, 200) + "...") : ''}
                          </p>
                          <Link to={"/post/"+x.slug} class="button__primary"><span>Read More</span></Link>
                        </div>
                      </div>
                    </div>
                  )
                }
              }) : ''}

            </div>
          </section>
        </> : ''}

        {posts?.length ? <>
          <section class="card-box-section padding-common light-bg">
          <div class="container">
            <div class="card-box-outer">
              <div class="row">
                {posts?.length ? posts.map((x, y) => {
                  return (
                    <div class="col-md-6 card-box-col">
                      <div class="card-box">
                        {x?.Featured_Video?.url ? <>
                          <div class="ratio ratio-16x9">
                            <video width="auto" controls>
                              <source src={x?.Featured_Video?.url ? (strapi_url + x.Featured_Video.url) : no_image_url} type="video/mp4" />
                              <source src="mov_bbb.ogg" type="video/ogg" />
                              Your browser does not support HTML video.
                            </video>
                          </div>
                        </> : <>
                          <div class="card-image image-adjustment">
                            <img src={x?.Featured_Image?.url ? (strapi_url + x.Featured_Image.url) : no_image_url} alt="" />
                          </div>
                        </>}
                        <div class="date-wrap">
                          <p>
                            {x?.createdAt ? new Date(x.createdAt).getDate() + "/" + new Date(x.createdAt).getMonth() + "/" + new Date(x.createdAt).getFullYear() : ''}
                          </p>
                        </div>
                        <div class="title">
                          <h3>{x?.Title ? x.Title : ''}</h3>
                        </div>
                        <div class="card-info-wrap">
                          <p>
                            {x?.Description ? (x.Description.substring(0, 200) + "...") : ''}
                          </p>
                        </div>
                        <div class="card-button">
                          <Link to={"/post/"+x.slug} class="button__primary"><span>Read More</span></Link>
                        </div>
                      </div>
                    </div>
                  )
                }) : ''}


              </div>
              <div class="button-wrap text-center">
                {disable_btn ? <>
                  <button onClick={loadMore} class="button__primary button__primary-fill"><span>Load More</span></button>
                </> : ''}
              </div>
            </div>

          </div>
        </section>
        </> : ''}      
        
      </main>

      <Footer />
    </>
  )
}
