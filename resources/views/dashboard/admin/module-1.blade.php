@extends('dashboard/layouts/dashboard-layout')
@section('main-section')

<!-- partial -->
<div class="content-wrapper">
    <div class="card">
        <div class="contaner">
            <div class="row">
                <div class="col-12 p-4">
                    <div class="text-center">
                        <h2> Chapter 1</h2>
                    </div>
     
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12 col-12 col-xl-6">
                    <div class="accordion accordion-flush" id="chapter1-left">
                        
                       
                        
                        

                        
                        
                        
                        
                       
                    </div>     
                </div>

                <div class="col-lg-6 col-sm-12 col-md-12 col-12 col-xl-6">
                    <div class="accordion accordion-flush" id="chapter1-right">
                        
                    </div>
                </div>
                <script>
    let chapter1 = [
        {
            "id": 1,
            "title": "Definition of Insurance",
            "paragraph": "Insurance is a financial arrangement where an individual or entity pays a premium to an insurance company in exchange for protection against specified risks. In the event of a covered loss, the insurance company provides financial compensation or benefits to the policyholder.",
            "isList": false,
        },
        {
            "id": 2,
            "title": "Purpose and Importance of Insurance",
            "isList": true,
            List: [
                "Risk Mitigation",
                "Financial Security",
                "Economic Stability",
            ]
        },
        {
            "id": 3,
            "title": "Risk Mitigation",
            "paragraph": "Insurance helps individuals and businesses mitigate financial risks associated with unexpected events, such as accidents, illnesses, or property damage.",
            "isList": false,
        },
        {
            "id": 4,
            "title": "Financial Security",
            "paragraph": "Insurance provides a sense of financial security by offering a safety net during challenging times, ensuring that the insured and their dependents are financially protected.",
            "isList": false,
        },
        {
            "id": 5,
            "title": "Economic Stability",
            "paragraph": "The collective contributions from policyholders create a pool of funds that can be used to compensate those who suffer covered losses, contributing to economic stability.",
            "isList": false,
        },
        {
            "id": 6,
            "title": "1.3 Basic Principles of Insurance",
            "isList": true,
            List: [
                "1.3.1 Utmost Good Faith",
                "1.3.2 Insurable Interest",
                "1.3.3 Indemnity",
                "1.3.4 Subrogation",
                "1.3.5 Contribution"
            ]
        }, {
            "id": 7,
            "title": "1.3.1 Utmost Good Faith",
            "paragraph": "Both the insurer and the insured are expected to disclose all relevant information truthfully and honestly when entering into an insurance contract.",
            "isList": false,
        },
        {
            "id": 8,
            "title": "1.3.2 Insurable Interest",
            "paragraph": "The insured must have a financial interest in the subject matter of the insurance policy, meaning that they would suffer a financial loss if the insured event occurs.",
            "isList": false,

        },
        {
            "id": 9,
            "title": "1.3.3 Indemnity",
            "paragraph": "Insurance is designed to compensate the insured for the actual financial loss suffered and not to provide a financial gain.",
            "isList": false,
        },
        {
            "id": 11,
            "title": "1.3.4 Subrogation",
            "paragraph": "If the insurance company pays a claim to the insured, it gains the right to take legal action against any third party responsible for the loss.",
            "isList": false,

        },

        {
            "id": 12,
            "title": "1.3.5 Contribution",
            "paragraph": "If an individual has multiple insurance policies covering the same risk, each policy contributes proportionately to the loss.",
            "isList": false,
        },
        {
            "id":13,
            "title":"Types of Insurance",
            "isList":true,
            
             List:[
                "Life Insurance","General Insurance",
             ]
        },
        {
            "id":14,
            "isSubHeading":true,
            "title":"Life Insurance",
            "subTitle":"Explanation of Life Insurance",
            "subParagraph":"Life insurance provides a payout to the beneficiaries of the policy in the event of the insured person's death. It serves as a financial protection tool for dependents.",
            "subTypeTitle":"Types of Life Insurance Policies",
            "subTypeArray":[
                {
                 "subTypeHeading":"a. Term Insurance",
                 "subTypeParagraph":"Provides coverage for a specified term. If the insured dies during the term, the beneficiaries receive the death benefit.",

                },
                {
                 "subTypeHeading":"b. Whole Life Insurance",
                 "subTypeParagraph":"Covers the insured for their entire life and builds cash value over time.",
                 
                }
                ,
                {
                 "subTypeHeading":"c. Endowment Policies",
                 "subTypeParagraph":"Combines life insurance coverage with a savings component. The policy matures at a specified date, and the insured receives the maturity benefit.",
                 
                }
                ,
                {
                 "subTypeHeading":"d. Unit-Linked Insurance Plans (ULIPs)",
                 "subTypeParagraph":"Integrates investment and insurance, allowing policyholders to invest in market-linked funds.",
                 
                }
            ]

        },
        {
            "id":15,
            "isSubHeading":true,
            "title":"General Insurance",
            "subTitle":"Overview of General Insurance",
            "subParagraph":"General insurance covers a range of non-life risks and provides financial protection against losses related to health, property, travel, and more.",
            "subTypeTitle":"Types of General Insurance Policies",
            "subTypeArray":[
                {
                 "subTypeHeading":"a. Health Insurance",
                 "subTypeParagraph":"Covers medical expenses, providing financial support for hospitalization, surgeries, and other health-related costs.",

                },
                {
                 "subTypeHeading":"b. Motor Insurance",
                 "subTypeParagraph":"Compensates for damages to or loss of a vehicle, and it also includes third-party liability coverage.",
                 
                }
                ,
                {
                 "subTypeHeading":"c. Home Insurance",
                 "subTypeParagraph":"Protects against damage or loss to the insured's home and its contents due to various perils such as fire, burglary, or natural disasters.",
                 
                }
                ,
                {
                 "subTypeHeading":"d. Travel Insurance",
                 "subTypeParagraph":"Covers unexpected events during travel, including trip cancellations, medical emergencies, and lost baggage.",
                 
                }
            ]

        },
        {
            "id":15,
            "isSubHeading":true,
            "title":"General Insurance",
            "subTitle":"Overview of General Insurance",
            "subParagraph":"General insurance covers a range of non-life risks and provides financial protection against losses related to health, property, travel, and more.",
            "subTypeTitle":"Types of General Insurance Policies",
        }
        
    ]
    let midpoint = Math.ceil(chapter1.length / 2);

  let firstHalf = chapter1.slice(0, midpoint);
  let secondHalf = chapter1.slice(midpoint);


  let chapterOneLeft = document.getElementById("chapter1-left");

// Loop through the first half of the chapter1 array
for (let i = 0; i < firstHalf.length; i++) {
    let item = firstHalf[i];

    // Create accordion item
    let accordionItem = document.createElement("div");
    accordionItem.classList = "accordion-item";

    // Create accordion header
    let accordionHeader = document.createElement("h2");
    accordionHeader.classList = "accordion-header";
    accordionHeader.id = `flush-heading${item.id}`;

    // Create accordion button
    let accordionButton = document.createElement("button");
    accordionButton.classList = "accordion-button collapsed";
    accordionButton.type = "button";
    accordionButton.setAttribute("data-bs-toggle", "collapse");
    accordionButton.setAttribute("data-bs-target", `#flush-collapse${item.id}`);
    accordionButton.setAttribute("aria-expanded", "false");
    accordionButton.setAttribute("aria-controls", `flush-collapse${item.id}`);
    accordionButton.textContent = item.title;

    // Append button to header
    accordionHeader.appendChild(accordionButton);

    // Create accordion collapse
    let accordionCollapse = document.createElement("div");
    accordionCollapse.id = `flush-collapse${item.id}`;
    accordionCollapse.classList = "accordion-collapse collapse";
    accordionCollapse.setAttribute("aria-labelledby", `flush-heading${item.id}`);
    accordionCollapse.setAttribute("data-bs-parent", "#accordionFlushExample");

    // Create accordion body
    let accordionBody = document.createElement("div");
    accordionBody.classList = "accordion-body";

    // Check if isList is true, then create ul and append li elements
    if (item.isList && Array.isArray(item.List)) {
        let unorderedList = document.createElement("ul");
        item.List.forEach((listItem) => {
            let listItemElement = document.createElement("li");
            listItemElement.textContent = listItem;
            unorderedList.appendChild(listItemElement);
        });
        accordionBody.appendChild(unorderedList);
    } 
    else if (item.isSubHeading && Array.isArray(item.subTypeArray)) {
    let subTitle = document.createElement("h4");
    subTitle.textContent = item.subTitle;

    let subParagraph = document.createElement("p");
    subParagraph.textContent = item.subParagraph;

    let subTypeTitle = document.createElement("h4");
    subTypeTitle.textContent = item.subTypeTitle;

    let subTypesDiv = document.createElement("div");

    item.subTypeArray.forEach((Elem, index) => {
        let subTypeHeading = document.createElement("h4");
        subTypeHeading.textContent = Elem.subTypeHeading;

        let subTypeParagraph = document.createElement("h6");
        subTypeParagraph.textContent = Elem.subTypeParagraph;

        subTypesDiv.appendChild(subTypeHeading);
        subTypesDiv.appendChild(subTypeParagraph);
    });

    accordionBody.appendChild(subTitle);
    accordionBody.appendChild(subParagraph);
    accordionBody.appendChild(subTypeTitle);
    accordionBody.appendChild(subTypesDiv);
} else {
    accordionBody.textContent = item.paragraph;
}


        
    

    // Append body to collapse
    accordionCollapse.appendChild(accordionBody);

    // Append header and collapse to item
    accordionItem.appendChild(accordionHeader);
    accordionItem.appendChild(accordionCollapse);

    // Append item to left container
    chapterOneLeft.appendChild(accordionItem);
}
let chapterOneRight = document.getElementById("chapter1-right");

// Loop through the second half of the chapter1 array
for (let i = 0; i < secondHalf.length; i++) {
    let item = secondHalf[i];

    // Create accordion item
    let accordionItem = document.createElement("div");
    accordionItem.classList = "accordion-item";

    // Create accordion header
    let accordionHeader = document.createElement("h2");
    accordionHeader.classList = "accordion-header";
    accordionHeader.id = `flush-heading${item.id}`;

    // Create accordion button
    let accordionButton = document.createElement("button");
    accordionButton.classList = "accordion-button collapsed";
    accordionButton.type = "button";
    accordionButton.setAttribute("data-bs-toggle", "collapse");
    accordionButton.setAttribute("data-bs-target", `#flush-collapse${item.id}`);
    accordionButton.setAttribute("aria-expanded", "false");
    accordionButton.setAttribute("aria-controls", `flush-collapse${item.id}`);
    accordionButton.textContent = item.title;

    // Append button to header
    accordionHeader.appendChild(accordionButton);

    // Create accordion collapse
    let accordionCollapse = document.createElement("div");
    accordionCollapse.id = `flush-collapse${item.id}`;
    accordionCollapse.classList = "accordion-collapse collapse";
    accordionCollapse.setAttribute("aria-labelledby", `flush-heading${item.id}`);
    accordionCollapse.setAttribute("data-bs-parent", "#accordionFlushExample");

    // Create accordion body
    let accordionBody = document.createElement("div");
    accordionBody.classList = "accordion-body";

    // Check if isList is true, then create ul and append li elements
    if (item.isList && Array.isArray(item.List)) {
        let unorderedList = document.createElement("ul");
        item.List.forEach((listItem) => {
            let listItemElement = document.createElement("li");
            listItemElement.textContent = listItem;
            unorderedList.appendChild(listItemElement);
        });
        accordionBody.appendChild(unorderedList);
    }
    else if (item.isSubHeading && Array.isArray(item.subTypeArray)) {
    let subTitle = document.createElement("h4");
    subTitle.textContent = item.subTitle;

    let subParagraph = document.createElement("p");
    subParagraph.textContent = item.subParagraph;

    let subTypeTitle = document.createElement("h4");
    subTypeTitle.textContent = item.subTypeTitle;

    let subTypesDiv = document.createElement("div");

    item.subTypeArray.forEach((Elem, index) => {
        let subTypeHeading = document.createElement("h4");
        subTypeHeading.textContent = Elem.subTypeHeading;

        let subTypeParagraph = document.createElement("h6");
        subTypeParagraph.textContent = Elem.subTypeParagraph;

        subTypesDiv.appendChild(subTypeHeading);
        subTypesDiv.appendChild(subTypeParagraph);
    });

    accordionBody.appendChild(subTitle);
    accordionBody.appendChild(subParagraph);
    accordionBody.appendChild(subTypeTitle);
    accordionBody.appendChild(subTypesDiv);
} else {
    accordionBody.textContent = item.paragraph;
}



    // Append body to collapse
    accordionCollapse.appendChild(accordionBody);

    // Append header and collapse to item
    accordionItem.appendChild(accordionHeader);
    accordionItem.appendChild(accordionCollapse);

    // Append item to right container
    chapterOneRight.appendChild(accordionItem);
}



</script>
            </div>
        </div>
    </div>
    @endsection