import React, { useState, useEffect, useRef } from 'react';
import axios from "axios";

function App() {
    const urlPath = window.location.pathname;
    const lastSegment = urlPath.split('/').pop();

    const [portfolio, setPortfolio] = useState([]);
    const [sections, setSections] = useState([]);
    const [newTitle, setNewTitle] = useState("");
    const inputRef = useRef(null);

    useEffect(() => {
        axios.get('/api/get-data?por_id=' + lastSegment)
            .then(response => {
                setPortfolio(response.data);
                setSections(response.data.portfolio_section);
            })
            .catch(error => console.error(error));
    }, [lastSegment]);


    // Function to add a section (send data to
    // end)
    const handleSave = () => {
        if (newTitle.trim() !== "") {
            axios.post('/api/store-data?por_id=' + lastSegment, { title: newTitle })
                .then(response => {
                    setSections([...sections, response.data]);
                    setNewTitle("");
                })
                .catch(error => console.error(error));
        }
    };

    // Function to delete a section
    const deleteSection = (id) => {
        console.log(id);

        axios.delete(`/api/delete-data?por_id=${lastSegment}&section_id=${id}`)
            .then(() => {
                setSections(sections.filter((section) => section.id !== id));
            })
            .catch(error => console.error(error));
    };

    // Autofocus input when modal opens
    useEffect(() => {
        const modal = document.getElementById('addPageModal');
        modal.addEventListener('shown.bs.modal', () => {
            inputRef.current?.focus();
        });
    }, []);

    return (
        <>
            <div className="row">
                <div className="col-2 pt-3">
                    <button type='button' className="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPageModal">
                        Add Page
                    </button>

                    {/* Section List */}
                    <ul className="list-group">
                        {sections.map((section) => (
                            <li key={section.id} className="list-group-item d-flex justify-content-between">
                                {section.title}
                                <div className="actions">
                                    <button className="btn btn-sm">
                                <i className="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <button className="btn btn-danger btn-sm" onClick={() => deleteSection(section.id)}>
                                    Delete
                                </button>
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
                <div className="col-10">
                    <div className="content-section">
                        {sections.map((section) => (
                            <div key={section.slug} id={section.slug}>
                                {section.slug === "home" && (
                                    <>
                                        <nav className="navbar navbar-expand navbar-light bg-light">
                                            <div className="container-fluid">
                                                <a className="navbar-brand brand-name" href="#">{portfolio.title}</a>

                                                <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                                    aria-label="Toggle navigation">
                                                    <span className="navbar-toggler-icon"></span>
                                                </button>

                                                <div className="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                                    <ul className="navbar-nav">
                                                        {sections?.map((section) => (
                                                            <li className="nav-item" key={section.slug}>
                                                                <a className="nav-link" href={`#${section.slug}`}>{section.title}</a>
                                                            </li>
                                                        ))}
                                                    </ul>
                                                </div>
                                            </div>
                                        </nav>
                                        <div className="home-section">
                                            <img src="https://cdn.pixabay.com/photo/2024/01/18/10/07/sunset-8516639_1280.jpg" className='img-fluid' alt="" srcSet="" />
                                        </div>
                                    </>
                                )}
                                {section.slug === "about" && (
                                    <div>
                                        <img src="https://cdn.pixabay.com/photo/2024/01/18/10/07/sunset-8516639_1280.jpg" className='img-fluid' alt="" srcSet="" />
                                    </div>
                                )}
                                {section.slug === "service" && (
                                    <div>
                                        <img src="https://cdn.pixabay.com/photo/2024/01/18/10/07/sunset-8516639_1280.jpg" className='img-fluid' alt="" srcSet="" />

                                    </div>
                                )}
                                {section.slug === "testimonial" && (
                                    <div>
                                        <img src="https://cdn.pixabay.com/photo/2024/01/18/10/07/sunset-8516639_1280.jpg" className='img-fluid' alt="" srcSet="" />

                                    </div>
                                )}
                                {section.slug === "contact" && (
                                    <div>
                                        <img src="https://cdn.pixabay.com/photo/2024/01/18/10/07/sunset-8516639_1280.jpg" className='img-fluid' alt="" srcSet="" />

                                    </div>
                                )}
                            </div>
                        ))}
                    </div>
                </div>
            </div>

            <div className="modal fade" id="addPageModal" tabIndex="-1" aria-labelledby="addPageModal" aria-hidden="true">
                <div className="modal-dialog modal-dialog-centered">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title">Enter Page Title</h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div className="modal-body">
                            <input
                                type="text"
                                className="form-control"
                                placeholder="Enter the page title"
                                value={newTitle}
                                onChange={(e) => setNewTitle(e.target.value)}
                                ref={inputRef}
                            />
                        </div>
                        <div className="modal-footer">
                            <button type='button' className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type='button'
                                className="btn btn-primary"
                                onClick={handleSave}
                                data-bs-dismiss="modal"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

export default App;
