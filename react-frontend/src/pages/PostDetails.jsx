import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { useState } from 'react';
import { useParams } from 'react-router-dom';
import { useEffect } from 'react';
import axiosInstance from '../Auth/Axios';
import parse from 'html-react-parser';
import Markdown from 'react-markdown';

export const PostDetails = () => {

    const { slug } = useParams();
    const no_image_url = "src/assets/images/no_image.jpg";
    const [post, setPost] = useState({});
    const strapi_url = import.meta.env.VITE_STRAPI_BACKEND_URL;

    useEffect(() => {
        const fetchPosts = async () => {
            const response = await axiosInstance({
                url: `${import.meta.env.VITE_STRAPI_BACKEND_URL}/api/posts-post?filters[slug][$eq]=${slug}&populate=*`,
                method: 'GET',
            });
            setPost(response.data.data);
        }
        fetchPosts();
    }, [slug])


    return (
        <>
        <Header />

            <main>
                {post?.length ? post.map((x, y) => {
                    return (
                        <>
                            <section class="details-section padding-common">
                                <div class="container">
                                    <div class="details-inner">
                                        <div class="title-wrap text-center">
                                            <ul class="d-flex justify-content-center align-items-center">
                                                <li>{x?.createdAt ? new Date(x.createdAt).getDate() + "/" + new Date(x.createdAt).getMonth() + "/" + new Date(x.createdAt).getFullYear() : ''}</li>
                                                <li>{x?.author?.name ? x.author.name : 'Admin'}</li>
                                            </ul>
                                            <h1>{x?.Title ? x.Title : ''}</h1>
                                        </div>
                                        {x?.Featured_Video?.url ? <>
                                            <div class="ratio ratio-16x9">
                                                <video width="auto" controls>
                                                    <source src={x?.Featured_Video?.url ? (strapi_url + x.Featured_Video.url) : no_image_url} type="video/mp4" />
                                                    <source src="mov_bbb.ogg" type="video/ogg" />
                                                    Your browser does not support HTML video.
                                                </video>
                                            </div>
                                            <br />
                                        </> : <>
                                            <div class="image-wraper image-adjustment">
                                                <img src={x?.Featured_Image?.url ? strapi_url + x.Featured_Image.url : no_image_url} alt="" />
                                            </div>
                                        </>}


                                        <div class="details-info">
                                            <Markdown>
                                                {x?.Description ? parse(x.Description) : ''}
                                            </Markdown>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </>
                    )
                }) : ''}
            </main>

        <Footer />
        </>
    )
}
