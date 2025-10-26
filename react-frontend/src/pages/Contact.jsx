import { Header } from "../components/Header"
import { Footer } from "../components/Footer"
import { useState, useEffect } from "react";
import parse from 'html-react-parser';
import axiosInstance from "../Auth/Axios";
import axios from "axios";


export const Contact = () => {

  const [data, setData] = useState({});
  const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;
  const no_image_url = "src/assets/images/no_image.jpg";
  const [first_name, setFirstName] = useState("");
  const [last_name, setLastName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [message, setMessage] = useState("");

  useEffect(() => {
    const fetchData = async () => {
      const response = await axiosInstance({
        url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/contact-us-page?populate[0]=Banner_Section.Side_Left_Arrow_Image&populate[1]=Banner_Section.Right_Float_Image&populate[2]=Contact_Form_Section.Right_Float_Image&populate[3]=Contact_Form_Section.Left_Float_Image`,
        method: 'GET',
      });
      setData(response.data.data);
    }
    fetchData();
  }, [])


  const saveData = (event) => {
    event.preventDefault();

    axios({
      url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/contact-requests-requests`,
      method: 'post',
      data: {
        "data": {
          "First_Name": first_name,
          "Last_Name": last_name,
          "Email": email,
          "Phone": phone,
          "Message": message
        }
      },
      headers: {
        Authorization: `Bearer ${import.meta.env.VITE_STRAPI_CONTACT_FORM_TOKEN}`
      }
    }).then((res) => {
      Swal.fire({
        title: "Your contact request saved!",
        icon: "success"
      });
      setFirstName("");
      setLastName("");
      setEmail("");
      setPhone("");
      setMessage("");
    }).catch((err) => {
      Swal.fire({
        title: err.response.data.error.message,
        icon: "error"
      });
    })

  }


  return (
    <>

      <Header />

      <main>
        <section className="inner-banner-section light-bg">
          <div className="container">
            <div className="row align-items-center">
              <div className="col-lg-5">
                <div className="info-wraper">
                  <h1>{data?.Banner_Section?.Hero_Section_Text ? parse(data.Banner_Section.Hero_Section_Text) : ''}</h1>
                </div>
              </div>
              <div className="col-lg-7">
                <div className="image-outer text-end position-relative pb-4">
                  <div className="man-image">
                    <img src={data?.Banner_Section?.Right_Float_Image?.url ? (strapi_url + data.Banner_Section.Right_Float_Image.url) : ''} alt="Contact Form Image" />
                  </div>
                  {data?.Banner_Section?.Side_Left_Arrow_Image?.url ? <>
                  <div className="element-design banner-lightning">
                    <img src={data?.Banner_Section?.Side_Left_Arrow_Image?.url ? (strapi_url + data.Banner_Section.Side_Left_Arrow_Image.url) : ''} alt="Left Arrow Image" />
                  </div>
                  </> : ''}
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        <section className="contact-us-section padding-common">
          <div className="container">
            <div className="top-row mb-50">
              <div className="row align-items-center">
                <div className="col-lg-6">
                  <div className="title-wrap">
                    <h2>
                      {data?.Contact_Form_Section?.Section_Title ? parse(data.Contact_Form_Section.Section_Title) : ''}
                    </h2>
                  </div>
                </div>
                <div className="col-lg-6">
                  <div className="desc-wrap">
                    <p>
                      {data?.Contact_Form_Section?.Short_Description ? parse(data.Contact_Form_Section.Short_Description) : ''}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div className="contact-form box-design">
              <div className="arrow-wrap">
                <div className="down-arrow right-down-arrow">
                  <img src={data?.Contact_Form_Section?.Left_Float_Image?.url ? (strapi_url + data.Contact_Form_Section.Left_Float_Image.url) : no_image_url} alt="Left Arrow Image" />
                </div>
                <div className="down-arrow left-down-arrow">
                  <img src={data?.Contact_Form_Section?.Right_Float_Image?.url ? (strapi_url + data.Contact_Form_Section.Right_Float_Image.url) : no_image_url} alt />
                </div>
              </div>
              <form onSubmit={saveData}>
                <div className="row">
                  <div className="col-sm-6">
                    <div className="form-row">
                      <label htmlFor>First name*</label>
                      <input type="text" className="form-control" value={first_name} onChange={(e) => setFirstName(e.target.value)} />
                    </div>
                  </div>
                  <div className="col-sm-6">
                    <div className="form-row">
                      <label htmlFor>Last name*</label>
                      <input type="text" className="form-control" value={last_name} onChange={(e) => setLastName(e.target.value)} />
                    </div>
                  </div>
                  <div className="col-sm-6">
                    <div className="form-row">
                      <label htmlFor>Phone no.*</label>
                      <input type="number" className="form-control" value={phone} onChange={(e) => setPhone(e.target.value)} />
                    </div>
                  </div>
                  <div className="col-sm-6">
                    <div className="form-row">
                      <label htmlFor>Email address*</label>
                      <input type="email" className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} />
                    </div>
                  </div>
                  <div className="col-12">
                    <div className="form-row">
                      <label htmlFor>Message</label>
                      <textarea className="form-control" value={message} onChange={(e) => setMessage(e.target.value)} />
                    </div>
                  </div>
                  <div className="col-12">
                    <div className="button-row text-center">
                      <div className="button__primary button__primary-fill button__submit">
                        <input type="submit" defaultValue="Submit" />
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
      </main>

      <Footer />

    </>
  )
}
