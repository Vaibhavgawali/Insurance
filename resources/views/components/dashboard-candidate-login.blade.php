<!-- partial -->
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span>Start Learning
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <button type="button" style="border: none;" class="" data-toggle="tooltip" data-placement="bottom" title="Modules for Candidates">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i></button>
                </li>
            </ul>
        </nav>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h6 class="font-weight-normal mb-3 fs-5">Start Learning - <span>Learn About the industry,products, distribution models etc.</span>
                        </h6>
                        <button type="button" id="startLearning" class="btn btn-gradient-primary btn-sm">Click Here</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-secondary card-img-holder text-white">
                    <div class="card-body">
                        <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h6 class="font-weight-normal mb-3 fs-5">Take Assessment and know your score
                        </h6>
                        <a href="/candidate-quizes" class="btn btn-gradient-primary btn-sm">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h6 class="font-weight-normal mb-3 fs-5">Post Your CV for new/better opportunity in insurance industry
                        </h6>
                        <a href="/candidate/{{auth()->user()->user_id}}/#cv-section" class="btn btn-gradient-primary btn-sm">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="show_module" style="display: none;">
        <div class="card main-chapter-div  ">
            <div class="container ">
                <div class="row ">
                    <div class="col-12 ">
                        <div class="text-center">
                            <h2 class="module-heading fs-3"> Chapter 1</h2>
                        </div>

                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xl-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <h4 class="module-dropdown"> Basics of Insurance</h4>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <section>
                                            <div class="row">
                                                <h2 class="text-center module-topic-heading">Basics of Insurance</h2>
                                                <div class="mt-4">
                                                    <h3 class="topic-heading">Definition of Insurance </h3>
                                                    <p class="topic-para">
                                                        Insurance is a financial arrangement where an individual or entity pays a premium to an insurance company in exchange for protection against specified risks. In the event of a covered loss, the insurance company provides financial compensation or benefits to the policyholder.
                                                    </p>
                                                    <h4 class="topic-sub-heading">Purpose and Importance of Insurance. </h4>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h6 class="sub-types-heading"> 🔶 Risk Mitigation:</h6>
                                                <p class="sub-type-para">
                                                    Insurance helps individuals and businesses mitigate financial risks associated with unexpected events, such as accidents, illnesses, or property damage.
                                                </p>
                                                <h6 class="sub-types-heading"> 🔶 Financial Security:</h6>
                                                <p class="sub-type-para">
                                                    Insurance provides a sense of financial security by offering a safety net during challenging times, ensuring that the insured and their dependents are financially protected.
                                                </p>
                                                <h6 class="sub-types-heading"> 🔶 Personal Accident Policy Economic Stability:</h6>
                                                <p class="sub-type-para">The collective contributions from policyholders create a pool of funds that can be used to compensate those who suffer covered losses, contributing to economic stability.</p>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="mt-2 topic-heading">1.3 Basic Principles of Insurance</h3>
                                                <h6 class="topic-sub-heading">1️⃣ Utmost Good Faith</h6>
                                                <p class="topic-para">
                                                    Both the insurer and the insured are expected to disclose all relevant information truthfully and honestly when entering into an insurance contract.
                                                </p>
                                                <h6 class="topic-sub-heading">2️⃣ Insurable Interest</h6>
                                                <p class="topic-para">The insured must have a financial interest in the subject matter of the insurance policy, meaning that they would suffer a financial loss if the insured event occurs.</p>
                                                <h6 class="topic-sub-heading">3️⃣ Indemnity</h6>
                                                <p class="topic-para">Insurance is designed to compensate the insured for the actual financial loss suffered and not to provide a financial gain.</p>
                                                <h6 class="topic-sub-heading">4️⃣ Subrogation</h6>
                                                <p class="topic-para">If the insurance company pays a claim to the insured, it gains the right to take legal action against any third party responsible for the loss.</p>
                                                <h6 class="topic">5️⃣ Contribution</h6>
                                                <p>If an individual has multiple insurance policies covering the same risk, each policy contributes proportionately to the loss.</p>
                                            </div>
                                            <div class="mt-4 py-4">
                                                <h3 class="mt-2 topic-heading">Types of Insurance</h3>
                                                <h3 class="py-2 topic-sub-heading">Life Insurance</h3>
                                                <h6>Explanation of Life Insurance</h6>
                                                <p>Life insurance provides a payout to the beneficiaries of the policy in the event of the insured person's death. It serves as a financial protection tool for dependents.</p>
                                                <h4>Types of Life Insurance Policies</h4>
                                                <h6>a. Term Insurance</h6>
                                                <p>Provides coverage for a specified term. If the insured dies during the term, the beneficiaries receive the death benefit.</p>
                                                <h6>b. Whole Life Insurance</h6>
                                                <p>Covers the insured for their entire life and builds cash value over time.</p>
                                                <h6>c. Endowment Policies</h6>
                                                <p>Combines life insurance coverage with a savings component. The policy matures at a specified date, and the insured receives the maturity benefit.</p>
                                                <h6>d. Unit-Linked Insurance Plans (ULIPs)</h6>
                                                <p>Integrates investment and insurance, allowing policyholders to invest in market-linked funds.</p>
                                            </div>
                                            <div class=" py-4">
                                                <h3 class="topic-sub-heading">General Insurance</h3>
                                                <h6>Overview of General Insurance</h6>
                                                <p>General insurance covers a range of non-life risks and provides financial protection against losses related to health, property, travel, and more.</p>
                                                <h4>Types of General Insurance Policies</h4>
                                                <h6>a. Health Insurance</h6>
                                                <p>Covers medical expenses, providing financial support for hospitalization, surgeries, and other health-related costs.</p>
                                                <h6>b. Motor Insurance</h6>
                                                <p>Compensates for damages to or loss of a vehicle, and it also includes third-party liability coverage.</p>
                                                <h6>c. Home Insurance</h6>
                                                <p>Protects against damage or loss to the insured's home and its contents due to various perils such as fire, burglary, or natural disasters.</p>
                                                <h6>d. Travel Insurance</h6>
                                                <p>Covers unexpected events during travel, including trip cancellations, medical emergencies, and lost baggage.</p>
                                            </div>
                                            <div class="py-4">
                                                <h3 class="topic-sub-heading">Insurance Regulatory Environment in India</h3>
                                                <h4>Regulatory Bodies</h4>
                                                <h4>Introduction to Regulatory Bodies</h4>
                                                <p>The Insurance Regulatory and Development Authority of India (IRDAI) is the primary regulatory body overseeing the insurance sector in India.</p>
                                                <h6>Role and Functions of IRDAI</h6>
                                                <p>IRDAI regulates and promotes the insurance industry, ensuring fair practices, protecting the interests of policyholders, and maintaining the financial stability of insurance companies.</p>
                                                <h4 class="py-2">Insurance Acts and Regulations</h4>
                                                <h6>Insurance Act, 1938</h6>
                                                <p>The Insurance Act, 1938, provides the legal framework for the insurance business in India, outlining licensing requirements, regulatory powers, and the structure of insurance companies.</p>
                                                <h6>IRDAI Act, 1999</h6>
                                                <p>The IRDAI Act, 1999, establishes the IRDAI as an autonomous regulatory authority, specifying its powers, functions, and responsibilities.</p>
                                            </div>
                                            <div class="py-4">
                                                <h3>Insurance Process in India</h3>
                                                <h4>Insurance Premiums</h4>
                                                <h6>Understanding Premiums</h6>
                                                <p>The premium is the amount paid by the policyholder to the insurance company to maintain coverage. It is based on factors such as age, health, coverage amount, and risk profile.</p>
                                                <h6>Factors Affecting Premium Calculation</h6>
                                                <p>Key factors influencing premium rates include the type of insurance, coverage amount, the policyholder's age, health condition, and lifestyle choices.</p>
                                                <h3 class="py-2">Policy Issuance</h3>
                                                <h6>Steps Involved in Obtaining an Insurance Policy</h6>
                                                <p>The process includes choosing the right policy, submitting an application, undergoing underwriting, and receiving the policy document.</p>
                                                <h6>Importance of Reading Policy Documents</h6>
                                                <p>Policyholders should carefully read and understand the terms and conditions, coverage details, and exclusions mentioned in the policy document.</p>
                                                <h3 class="py-2">Claims Process</h3>
                                                <h6>Initiating a Claim</h6>
                                                <p>Policyholders need to notify the insurance company promptly after a covered event occurs, providing all necessary information.</p>
                                                <h6>Documentation Required for Filing a Claim</h6>
                                                <p>The claims process involves submitting relevant documents, such as proof of loss, medical reports, or police reports, depending on the nature of the claim.</p>
                                                <h6>Settlement Process</h6>
                                                <p>Once the claim is approved, the insurance company disburses the agreed-upon amount to the policyholder or the beneficiary.</p>
                                            </div>
                                            <div class="py-4">
                                                <h3>Insurance Awareness and Financial Planning</h3>
                                                <h4>Importance of Insurance in Financial Planning</h4>
                                                <p>Insurance plays a crucial role in a comprehensive financial plan by providing protection against unforeseen events, reducing financial risks, and ensuring long-term stability.</p>
                                                <p>Risks Covered by Insurance</p>
                                                <p>Insurance helps individuals and businesses manage risks related to health, life, property, liability, and other potential threats.</p>
                                                <p>Assessing Individual Insurance Needs</p>
                                                <p>Understanding personal or business-specific risks and choosing appropriate insurance coverage based on individual needs and circumstances.</p>
                                            </div>
                                            <div class="py-4">
                                                <h3>Emerging Trends in Insurance</h3>
                                                <h6>Introduction to Technological Advancements</h6>
                                                <p>Technological innovations, such as artificial intelligence, data analytics, and blockchain, are transforming the insurance industry.</p>
                                                <p>Digitalization and Insurtech</p>
                                                <p>The integration of digital technologies and the rise of insurtech startups are enhancing customer experiences, streamlining processes, and creating new insurance products and services.</p>
                                            </div>
                                            <!--End-->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card main-chapter-div mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="text-center">
                            <h2 class="module-heading fs-2"> Chapter 2</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xl-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <h4 class="module-dropdown">Common Regulations / Practices / Rules around Insurance</h4>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <section>
                                            <div class="row">
                                                <h2 class="text-center module-topic-heading"></h2>
                                                <div class="mt-4">
                                                    <h3 class="topic-heading">Regulator : <span class="fs-5">Insurance Regulatory and Development Authority of India</span> </h3>
                                                    <h4 class="topic-sub-heading">Governance</h4>
                                                    <p class="topic-para">
                                                        Insurance Act, 1938 (as amended from time to time) Insurance Regulatory and Development Authority Act 1999 (IRDA Act)
                                                    </p>
                                                    <h4 class="topic-sub-heading">AROUND FINANCIALS</h4>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h4 class="topic-sub-heading">Solvency Ratio: <span class="fs-6">Minimum Solvency Ratio to be maintained by Insurance Companies is 1.5</span></h4>
                                                <p class="topic-para">
                                                    • An individual Agent/Advisor needs to obtain a License before soliciting insurance policies. An individual Agent can solicit only for 1 Insurance company in each business line, i.e. Life, General and Health.

                                                    A Corporate Agent (including Banks) can partner with maximum of 9 Insurance Companies in each Business Line i.e. Life, General and Health

                                                </p>
                                                <p class="topic-para">• A Broker can partner with any number of insurance companies in each business line.</p>
                                                <p class="topic-para">• Insurance Marketing Firms can partner with 6 Insurance companies in each business line.</p>
                                                <p class="topic-para">• A Point of Sales Person can sell only POS products which are templated as per IRDAI guidelines.</p>
                                            </div>
                                            <div class="mt-4">
                                                <h4 class="topic-sub-heading">AROUND POLICY</h4>
                                                <p class="topic-para">'free look' period of 15 days (30 days in case of electronic policies) in Life Insurance Policies from the date of receipt of policy document, by stating the reasons for your objection.</p>
                                                <p class="topic-para">In accordance to the provisions of Regulation 12(i) of IRDAI (Health Insurance) Regulations 2016 (HIR 2016), all health insurance policies shall ordinarily provide for an entry age of at least up to 65 years.</p>
                                                <h5 class="topic-subtypes-heading">Carrying at least a third party car insurance is mandatory.</h5>
                                                <p class="topic-para">Beginning 1st January 2023, India's Insurance Regulatory and Development Authority (IRDAI) mandated Know Your Customer (KYC) verification for all motor insurance customers.</p>
                                                <p class="topic-para">The principle of indemnity is a fundamental principle of insurance. It states that insurers should only pay the actual loss suffered by the insured. The purpose of an insurance contract is to restore the insured to the same financial position they were in before the incident</p>
                                                <p class="topic-para">7 basic principles that should be upheld, i.e. Insurable interest, Utmost good faith, proximate cause, indemnity, subrogation, contribution and loss of minimization.</p>
                                            </div>
                                            <!--End-->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card main-chapter-div mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="text-center">
                            <h2 class="module-heading fs-2"> Chapter 3</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xl-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        <h4 class="module-dropdown">Distribution Channels of Insurance Companies</h4>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <section>
                                            <div class="row">
                                                <h2 class="text-center module-topic-heading"></h2>
                                                <div class="mt-4">
                                                    <h3 class="topic-heading">Agency Channel:</h3>
                                                    <p class="topic-para">
                                                        As the name suggests, in this Channel, distribution of Insurance products is done through Agents/Advisors.
                                                    </p>
                                                    <p class="topic-para">Advisors are hired as per process prescribed by IRDAI (Insurance Regulator)</p>
                                                    <p class="topic-para">There is Hierarchy which manages the Channel. First Line Managers generally have the responsibility of recruiting Advisors. Advisors start sourcing the business after taking certification as prescribed by the Regulator.</p>
                                                    <h4 class="topic-sub-heading">AROUND FINANCIALS</h4>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h4 class="topic-sub-heading">Bancassurance Channel:</h4>
                                                <p class="topic-para">
                                                    Bancassurance Channel:
                                                    Bancassurance Channel is the synergy between a Bank and an Insurance company which enables the Bank to distribute insurance products of that Insurance Company as a Corporate Agent.
                                                    Employees of the Bank who sell insurance on behalf of the Bank undertake a certification as prescribed by the Regulator and are called Specified Persons.
                                                </p>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="topic-sub-heading">Group/Institutional Channel</h3>
                                                <h4 class="sub-types-heading">Group Channel generally comprises of following</h4>
                                                <h6>a.Term Business</h6>
                                                <h6>b.Funds (Retirals) </h6>
                                                <p class="topic-para">•Term Business can be of Employer-Employee, Credit Life or Affinity Group</p>
                                                <p class="topic-para">Generally large Corporates buy the Term Insurance for their employees as bulk purchase. Insurance companies also manages funds such as Superannuation, Gratuity etc.</p>
                                                <p class="topic-para">Most of the Insurance Companies have a separate Channel to manage this B2B business.</p>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="topic-sub-heading">Direct Marketing</h3>
                                                <p class="topic-para">Direct Marketing Channel is involved in distributing the products by reaching out directly to the Customer instead of an intermediary like Advisor, Corporate Agent, Broker, Bank etc.</p>
                                                <p class="topic-para">Solicitation of insurance products is done directly by the employees of the Company or through a digital platform where no intermediary is involved.</p>

                                            </div>
                                            <div class="mt-4">
                                                <h3 class="topic-sub-heading">Brokers/Non-Bank Corporate Agents</h3>
                                                <p class="topic-para">Broking Channel manages the distribution of insurance products through Insurance Brokers. These are registered Insurance Brokers with the Regulator (IRDAI).</p>
                                                <p class="topic-para">Brokers can sell for as many insurance companies as they want as compared to a Corporate Agent who can sell for maximum of 9 Insurance Companies in one business line (Life, General and Health)</p>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="topic-sub-heading">Insurance Marketing Firms (IMF)</h3>
                                                <p class="topic-para">
                                                    This is a form of distribution which requires IMF License and are allowed to set up offices in prescribed geography only which generally is a State.
                                                    IMFs are also allowed to distribute other financial services products such as Mutual Funds, FDs, Bonds etc also. Non-Insurance products are regulated by respective Regulators such as SEBI, RBI etc.
                                                </p>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="topic-sub-heading">Point of Sale Person (POSP)</h3>
                                                <p class="topic-para">
                                                    Point of Sale Person is a very interested model where the Advisor (POSP) need not take standard license/certification as in the case of normal advisor.
                                                </p>
                                                <p class="topic-para">POSP certification can be done by Insurance Company directly or an intermediary. Since, this has a very simplified certification process, there are only prescribed templated products which can be sold by POSPs.</p>

                                            </div>
                                            <!--End-->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card main-chapter-div mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="text-center">
                            <h2 class="module-heading fs-2"> Chapter 4</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xl-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        <h4 class="module-dropdown">Miscellaneous</h4>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <section>
                                            <div class="row">
                                                <h2 class="text-center module-topic-heading"></h2>
                                                <div class="mt-4">
                                                    <h3 class="topic-heading">Bancassurance Model Explained</h3>
                                                    <p class="topic-para">
                                                        An employee of the Bank, who is certified as Specified Person, can sell Insurance Policies to its customers. However, SP can sell only those Company’s Policies with which the Bank has a tie up as a Corporate Agent.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h4 class="sub-types-heading">If you are an employee in Bancassurance Function of an Insurance company, then you should:</h4>
                                                <p>a. Understand the customer segment of the Bank where the sale is happening</p>
                                                <p>b. Provide with right information of the Products suitable for the segment to the Seller SPs</p>
                                                <p>c. Ensure you understand the products and processes for issuances of the Policy very well so that you can guide the Seller SPs and avoid any confusion later</p>
                                                <p>d. Arrange training of the Sellers at regular intervals. Remember, Insurance is one of the products they are selling</p>
                                                <p>e. Convince yourself first with the product you are recommending, then only take that to partner. Your success rate will always be higher.</p>
                                            </div>
                                            <div class="mt-4">
                                                <h4 class="sub-types-heading">Point of Sale Person Model (LI) explained</h4>
                                                <p class="topic-para">Life Insurer or Insurance Intermediary can engage POSPs to sell templated POSP products as allowed by the Regulator.</p>
                                                <p class="topic-para">• Life Insurer or Insurance Intermediary proposing to engage POSP-LI shall.</p>
                                                <p>a. Conduct an in-house training of fifteen (15) hours for the candidate.</p>
                                                <p>b. The POSP-LI shall be at least 18 years age completed and shall have educational qualification of 10th standard pass.</p>
                                                <p>c. Conduct an examination after successful completion of the training.</p>
                                                <p>d. Arrange training of the Sellers at regular intervals. Remember, Insurance is one of the products they are selling.</p>
                                                <p>e. Issue certificate to the candidate who pass the examination.</p>
                                                <p>f. Engage the successful candidates in the examination as POSP-LI by issuing an Appointment Letter with appropriate terms and conditions within 15 days from passing the examination.</p>
                                                <p>g. Allot a POS Code to the POSP-LI and place the same in the Appointment Letters issued to POSP-LI.</p>
                                                <p>h. Maintain a proper training and examination record for at least five (5) years from the end of the financial year in which these are conducted and shall be made available to the inspecting official of the Authority during on-site inspection.</p>
                                            </div>
                                            <!--End-->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card main-chapter-div mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h2 class="module-heading fs-2"> Chapter 5</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xl-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                        <h4 class="module-dropdown">PRODUCTS OF INSURANCE COMPANIES</h4>
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <section>
                                            <div class="row">
                                                <h2 class="text-center module-topic-heading"></h2>
                                                <div class="mt-4">
                                                    <h4 class="topic-sub-heading">LIFE INSURANCE</h4>
                                                    <p class="topic-para">
                                                        Life insurance provides a pay-out to the beneficiaries of the policy in the event of the insured Person's death. It serves as a financial protection tool for dependents. It serves as a financial protection tool for dependents
                                                    </p>
                                                    <h5 class="sub-types-heading">Few Types of Life Insurance Policies</h5>
                                                    <ul>
                                                        <li><span class="fw-bold">Term Insurance</span></li>
                                                        <p class="topic-para">Provides coverage for a specified term. If the insured dies during the term, the beneficiaries receive the death benefit.</p>
                                                        <li class="fw-bold">Traditional Policies</li>
                                                        <p class="topic-para">Combines life insurance coverage with a savings component. The policy matures at a specified date, and the insured receives the maturity benefit.</p>
                                                        <li class="fw-bold">Participating or Par Policies</li>
                                                        <p class="topic-para">Par Policy is basically a life insurance policy which has savings or investment element into it which providers for
                                                            Insurance Cover i.e. in case of eventuality to life insured, Death benefit is paid to the nominee
                                                        </p>
                                                        <p class="topic-para"> Insured gets Returns on the Premium paid which is paid on Maturity of the Policy as Maturity Value. In the Par Policy or Participating Plan, returns provided to the insured are not guaranteed. It depends on the Bonus declared on pre-defined frequency which generally is annual.</p>
                                                        <li class="fw-bold">Non-Participating or Non-Par Policies</li>
                                                        <p class="topic-para">Non-Participating Plan or Non-Par Policy is the one which provides for
                                                            Insurance Cover
                                                            Returns provided on the Policy are Guaranteed and known on day 1 of Policy. Which means you exactly know what you are going to get on Maturity of the Policy which is guaranteed.
                                                        </p>
                                                        <li class="fw-bold">Unit-Linked Insurance Plans (ULIPs)</li>
                                                        <p class="topic-para">Integrates investment and insurance, allowing policyholders to invest in market-linked funds.
                                                            Other Variants: Annuity Product, Term Return of Premium etc
                                                        </p>
                                                    </ul>
                                                </div>
                                                <div class="mt-4">
                                                    <h4 class="topic-sub-heading">GENERAL INSURANCE</h4>
                                                    <p class="topic-para">
                                                        General insurance covers a range of non-life risks and provides financial protection against losses related to health, property, travel, and more.
                                                    </p>
                                                    <h5 class="sub-types-heading">Few types of General Insurance Policies</h5>
                                                    <ul>
                                                        <li><span class="fw-bold">Motor Insurance</span></li>
                                                        <p class="topic-para">Compensates for damages to or loss of a vehicle, and it also includes third-party liability coverage.</p>
                                                        <li class="fw-bold">Home Insurance</li>
                                                        <p class="topic-para">Protects against damage or loss to the insured's home and its contents due to various perils such as fire, burglary, or natural disasters.</p>
                                                        <li class="fw-bold">Travel Insurance</li>
                                                        <p class="topic-para">Covers unexpected events during travel, including trip cancellations, medical emergencies, and lost baggage.
                                                        </p>
                                                        <li class="fw-bold">Health Insurance</li>
                                                        <p class="topic-para">Covers medical expenses, providing financial support for hospitalization, surgeries, and other health-related costs
                                                        </p>
                                                        <li class="fw-bold">Fire Insurance</li>
                                                        <p class="topic-para">Fire insurance compensates you for losses incurred due to accidental fire breakout.
                                                        </p>
                                                    </ul>
                                                </div>
                                                <div class="mt-4">
                                                    <h4 class="topic-sub-heading">HEALTH INSURANCE </h4>
                                                    <p class="topic-para">
                                                        In addition to general insurance companies providing for health insurance policies, there are stand along Health Insurers which specifically provide for health/medical related expenses solutions.
                                                    </p>
                                                    <h5 class="sub-types-heading"><strong>Indemnity product</strong> which means claim is paid for actual expenses on treatment as per the coverage of the Policy</h5>
                                                    <h6 class="topic-sub-heading">Few Examples</h6>
                                                    <ul>
                                                        <li>Individual Health Insurance</li>
                                                        <li>Family Floater Health Insurance</li>
                                                        <li>Group Health Insurance</li>
                                                        <li>Senior Citizens Health Insurance</li>
                                                        <li>Maternity Health Insurance</li>
                                                        <li>Top Up Health Insurance</li>
                                                    </ul>
                                                </div>
                                                <div class="mt-4">
                                                    <h4 class="topic-sub-heading">Fixed Benefit Products </h4>
                                                    <p class="topic-para">
                                                        Under this category, claim is paid for a pre-defined amount on the occurrence of covered event as compared to actual expenses done.
                                                    </p>
                                                    <h5 class="sub-types-heading"><strong>Indemnity product</strong> which means claim is paid for actual expenses on treatment as per the coverage of the Policy</h5>
                                                    <h6 class="topic-sub-heading">Few Examples</h6>
                                                    <ul>
                                                        <li>Hospital Cash Policy</li>
                                                        <li>Critical Illness with fixed benefits</li>
                                                        <li>Personal Accident Policy</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End-->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container mt-3">
            <h2 class="text-center">Job Board</h2>
            <div class="text-left">
                <h3>Present Positions:</h3>
            </div>

            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h3 class="font-weight-normal mb-3">Agency Channel <i class="mdi mdi-windows mdi-24px float-right"></i>
                            </h3>
                            <h4>Agency Manager</h4>
                            <h4>Branch Manager</h4>
                            <h4>Regional Manager</h4>
                            <h4>Zonal Manager</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h3 class="font-weight-normal mb-3">Bancassurance Channel <i class="mdi mdi-bookmark-plus mdi-24px float-right"></i>
                            </h3>
                            <h4>Unit Manager/Relationship Officer</h4>
                            <h4>Sales Manager, Cluster Manager</h4>
                            <h4>Area Sales Manager</h4>
                            <h4>Regional Sales Manager</h4>
                            <h4>Zonal Sales Manager</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h3 class="font-weight-normal mb-3">Direct Marketing <i class="mdi mdi-account mdi-24px float-right"></i>
                            </h3>
                            <h4>Service Manager</h4>
                            <h4>Area Sales Manager</h4>
                            <h4>Regional Sales Manager</h4>
                            <h4>Zonal Sales Manager</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-secondary card-img-holder text-white">
                        <div class="card-body">
                            <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h3 class="font-weight-normal mb-3">Group Business <i class="mdi mdi-briefcase-check mdi-24px float-right"></i>
                            </h3>
                            <h4>Head-Credit Life</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-dark card-img-holder text-white">
                        <div class="card-body">
                            <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                            <h3 class="font-weight-normal mb-3">Non-Sales Functions <i class="mdi mdi-tag mdi-24px float-right"></i>
                            </h3>
                            <h4>Operations Head</h4>
                            <h4>Senior Underwriter</h4>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        let startLearning = $('#startLearning')
        let toggle =true;
        let show_module = $('.show_module')
        startLearning.on('click', function() {
            if(toggle ==true){
            show_module.css("display", "block");
                toggle= false
            }
            else
            {
                show_module.css("display", "none");
                toggle = true
            }
        })
    })
</script>