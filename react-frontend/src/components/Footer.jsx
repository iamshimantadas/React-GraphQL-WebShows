import { useState } from "react";
import { useEffect } from "react";
import axios from "../Auth/Axios";
import { Link } from "react-router-dom";
import parse from 'html-react-parser';


export const Footer = () => {
   const [data, setData] = useState({});
   const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
   const no_image_url = "src/assets/images/no_image.jpg";

   useEffect(() => {
     const fetchData = async () =>{
      const response = await axios({
         url:`${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/global?populate[0]=Footer_Section.Footer_Image`,
         method:'GET',
      });
      setData(response.data.data);
     }
     fetchData();
   }, [])

   return (
      <>
         <footer class="main-footer">
            <div class="container">
               <div class="top-footer padding-common">
                  <div class="footer-row d-flex flex-wrap align-items-center justify-content-between">
                     <div class="logo-wrap">
                        <Link to="/">
                           <img src={data?.Footer_Section?.Footer_Image?.url ? strapi_url+data.Footer_Section.Footer_Image.url : no_image_url} alt="" />
                        </Link>
                     </div>
                     <div class="footer-menu">
                        <ul class="nav">
                           <li><Link to="/">Home</Link></li>
                           <li><Link to="/founder">Founder</Link></li>
                           <li><Link to="/team">Team</Link></li>
                           <li><Link to="/articles">Articles</Link></li>
                           <li><Link to="/contact-us">Contact Us</Link></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="bottom-footer text-center position-relative">
                  <p>© {data?.Footer_Section?.Copyright_Text ? parse(data.Footer_Section.Copyright_Text) : ''}</p>
               </div>
            </div>
         </footer>
      </>
   )
}
