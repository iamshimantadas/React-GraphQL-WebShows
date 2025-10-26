import { Routes, Route } from "react-router-dom"
import { Home } from "../pages/Home"
import { Founder } from "../pages/Founder"
import { Team } from "../pages/Team"
import { Companies } from "../pages/Companies"
import { Articles } from "../pages/Articles"
import { Podcasts } from "../pages/Podcasts"
import { Videos } from "../pages/Videos"
import { Contact } from "../pages/Contact"
import { ErrorPage } from "../pages/ErrorPage"
import { PostDetails } from "../pages/PostDetails"


export const Routing = () => {
    return (
        <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/founder" element={<Founder />} />
            <Route path="/team" element={<Team />} />
            <Route path="/companies" element={<Companies />}/>
            <Route path="/articles" element={<Articles />}/>
            <Route path="/podcasts" element={<Podcasts />}/>
            <Route path="/videos" element={<Videos />}/>
            <Route path="/contact-us" element={<Contact />}/>
            <Route path="/post/:slug" element={<PostDetails />}/>
            <Route path="*" element={<ErrorPage />} />
        </Routes>
    )
}
