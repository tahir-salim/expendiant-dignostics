@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientAllTest">
        <ul>
            <li>
                <div class="testsCater">
                    <div class="tsthead accordion">
                        <img src="assets/images/heartbeat.png" alt="">
                        <h6>Cardiac Test</h6>
                    </div>
                    <div class="accordion-content">
                        <div class="testlist labTestList">
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Cardiac</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Apolipoprotein A1</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Apolipoprotein B</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Cholesterol</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> CK</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> CKMB</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> CK-MB</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Direct HDL</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Direct LDL</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Homocysteine</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> LDH</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Myoglobin</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> NT-proBNP</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Triglycerides</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Troponin I ES</p>
                            <input type="text" placeholder="Enter Test Name">
                        </div>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead accordion">
                        <img src="assets/images/bones.png" alt="">
                        <h6>Bone Disease</h6>
                    </div>
                    <div class="accordion-content">
                        <div class="testlist labTestList">
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Cardiac</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Apolipoprotein A1</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Apolipoprotein B</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Cholesterol</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> CK</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> CKMB</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> CK-MB</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Direct HDL</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Direct LDL</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Homocysteine</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> LDH</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Myoglobin</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> NT-proBNP</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Triglycerides</p>
                            <p><a href="#"><i class="fas fa-trash-alt"></i></a> Troponin I ES</p>
                            <input type="text" placeholder="Enter Test Name">
                        </div>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/spinal-cord.png" alt="">
                        <h6>Spinal</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/chemistry.png" alt="">
                        <h6>General Chemistry</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
            </li>
            <li>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/pregnant.png" alt="">
                        <h6>Prenatal</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/drugs.png" alt="">
                        <h6>Drugs of Abuse (Urine)</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/measurement.png" alt="">
                        <h6>Diabetes</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/urology.png" alt="">
                        <h6>Urine</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
            </li>
            <li>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/kidneys.png" alt="">
                        <h6>Renal</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/hepatic.png" alt="">
                        <h6>Hepatic</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/bacteria.png" alt="">
                        <h6>Infectious Disease</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/womb.png" alt="">
                        <h6>Reproductive Endocrinology</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
            </li>
            <li>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/blood-cells.png" alt="">
                        <h6>Hematology</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/medicine.png" alt="">
                        <h6>Therapeutic Drug Monitoring</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/skin-problems.png" alt="">
                        <h6>Inflammatory</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/lipid-profile.png" alt="">
                        <h6>Lipids</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
            </li>
            <li>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/immunosuppressant-drugs.png" alt="">
                        <h6>Immunosuppressant Drugs</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/cancer.png" alt="">
                        <h6>Oncology</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/anemia.png" alt="">
                        <h6>Anemia</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/pancreas.png" alt="">
                        <h6>Pancreatic</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
            </li>
            <li>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/nutrition.png" alt="">
                        <h6>Nutritional Assessment</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/respiratory.png" alt="">
                        <h6>Respiratory</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/toxic.png" alt="">
                        <h6>Toxicology</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
                <div class="testsCater">
                    <div class="tsthead">
                        <img src="assets/images/thyroid.png" alt="">
                        <h6>Thyroid/Metabolic</h6>
                    </div>
                    <a href="#" id="VewTest">View Tests</a>
                </div>
            </li>
        </ul>
        <div class="bookAppoint addnewCate">
            <a href="#">Add New Test Category</a>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="popupMain add_test_CatePop">
        <div class="popInner">
            <div class="row">
                <div class="col-md-7">
                    <h4>Add Test Category</h4>
                    <div class="field">
                        <label for="">Category Name</label>
                        <input type="text" placeholder="Nutritional Assessment">
                    </div>
                    <div class="field">
                        <label for="">Add Icon</label>
                        <input type="file" placeholder="">
                    </div>
                    <div class="field">
                        <label for="">Add Tests</label>
                        <input type="text" placeholder="Enter Test Name">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="icnThmb">
                        <i class="far fa-image"></i>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="labTestList">
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Albumin</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Direct TIBC</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Ferritin</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Folate</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Iron</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="labTestList">
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Albumin</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Direct TIBC</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Ferritin</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Folate</p>
                                <p><a href="#"><i class="fas fa-trash-alt"></i></a> Iron</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button>Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection