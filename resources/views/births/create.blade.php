@extends('layouts.app')

@push('styles')
    @vite('resources/css/birth-form.css')
@endpush

@section('content')
<div class="w-full py-6">
    <div class="mb-4 flex gap-2 max-w-[960px] mx-auto">
        <button type="button" id="p1" class="btn-outline-info active" onclick="showP('page1')">Page 1</button>
        <button type="button" id="p2" class="btn-outline-info" onclick="showP('page2')">Page 2</button>
    </div>

    <form method="POST" action="{{ route('births.store') }}" id="addbirth_form">
        @csrf

        <div class="form-102-wrapper mb-8 shadow-sm">

            <div id="page1">
                <div class="f-row">
                    <div class="c-9 br-green p-3 text-center h-[120px]">
                        <p class="text-[10px] text-left mb-0">Municipal Form No. 102</p>
                        <p class="text-[12px] mb-0 mt-2">Republic of the Philippines</p>
                        <p class="text-[10px] mb-1">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
                        <h1 class="text-[24px] font-bold mt-1 tracking-wide">CERTIFICATE OF LIVE BIRTH</h1>
                    </div>
                    <div class="c-3 br-green !border-l-0 !border-b-0 f-bg-grey p-2 flex flex-col justify-between h-[120px]">
                        <div><span class="f-h6 block mb-[2px]">Book No.</span><input type="text" class="f-input f-input-cyan"></div>
                        <div><span class="f-h6 block mb-[2px]">Page No.</span><input type="text" class="f-input f-input-cyan"></div>
                    </div>
                </div>

                <div class="f-row">
                    <div class="c-9 br-green !border-t-0 flex flex-col justify-center py-1">
                        <div class="flex items-center px-2 py-[2px]"><span class="text-[10px] w-[120px]">Province</span><div class="flex-grow"><input type="text" class="f-input" value="TARLAC"></div></div>
                        <div class="flex items-center px-2 py-[2px]"><span class="text-[10px] w-[120px]">City/Municipality</span><div class="flex-grow"><input type="text" class="f-input" value="GERONA"></div></div>
                    </div>
                    <div class="c-3 br-green !border-l-0 !border-t-0 f-bg-grey p-2 flex flex-col justify-end">
                        <span class="f-h6 block mb-[2px]">Registry No.</span><input type="text" name="registry_number" class="f-input f-input-cyan" required>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0">
                    <div class="v-text border-r-green">CHILD</div>
                    <div style="width: calc(100% - 34px);" class="flex flex-col">
                        <div class="f-row border-b-green pad-inner items-end">
                            <div class="c-1"><h6 class="f-h6">1. NAME</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green">(First)</span><input type="text" name="first_name" class="f-input text-center"></div>
                            <div class="c-4 px-1"><span class="f-label-green">(Middle)</span><input type="text" name="middle_name" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green">(Last)</span><input type="text" name="last_name" class="f-input text-center"></div>
                        </div>
                        <div class="f-row border-b-green items-end">
                            <div class="c-3 border-r-green pad-inner pb-1">
                                <h6 class="f-h6">2. SEX <span class="f-label-green inline font-normal">(Male/Female)</span></h6>
                                <select name="sex" class="f-input mt-1"><option value="Male">Male</option><option value="Female">Female</option></select>
                            </div>
                            <div class="c-2 pad-inner"><h6 class="f-h6">3. DATE OF<br>&emsp;BIRTH</h6></div>
                            <div class="c-7 pad-inner pr-2">
                                <div class="f-row"><span class="f-label-green c-4">(Day)</span><span class="f-label-green c-4">(Month)</span><span class="f-label-green c-4">(Year)</span></div>
                                <div class="f-row bg-[#e9ecef] overflow-hidden" style="height:24px;">
                                    <input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]">
                                </div>
                            </div>
                        </div>
                        <div class="f-row border-b-green pad-inner items-end pb-1">
                            <div class="c-2"><h6 class="f-h6">4. PLACE OF <br>&emsp;BIRTH</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green text-left mb-[2px]">(Name of Hospital/Clinic/Institution/<br>House No.,St.,Barangay)</span><input type="text" name="place_of_birth" class="f-input"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(City/Municipality)</span><input type="text" class="f-input"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(Province)</span><input type="text" class="f-input"></div>
                        </div>
                        <div class="f-row pad-inner items-end pb-1">
                            <div class="c-3 border-r-green pr-1"><h6 class="f-h6">5a. TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span class="f-label-green inline font-normal">(Single, Twin, Triplet, etc.)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 border-r-green px-1"><h6 class="f-h6">5b. IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span class="f-label-green inline font-normal">(First, Second, Third, etc.)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 border-r-green px-1"><h6 class="f-h6">5c. BIRTH ORDER <span class="f-label-green inline font-normal">(Order of this birth to previous live births...)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 pl-1"><h6 class="f-h6">6. WEIGHT OF BIRTH</h6><div class="flex items-center mt-3"><input type="text" name="weight" class="f-input text-center flex-grow"><span class="text-[10px] ml-1">grams</span></div></div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0">
                    <div class="v-text border-r-green">MOTHER</div>
                    <div style="width: calc(100% - 34px);" class="flex flex-col">
                        <div class="f-row border-b-green pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">7. MAIDEN<br>&nbsp;&nbsp;&nbsp;&nbsp;NAME</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green">(First)</span><input type="text" name="mother_first_name" class="f-input text-center"></div>
                            <div class="c-4 px-1"><span class="f-label-green">(Middle)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green">(Last)</span><input type="text" name="mother_last_name" class="f-input text-center"></div>
                        </div>
                        <div class="f-row border-b-green pad-inner pb-1">
                            <div class="c-6 border-r-green pr-2"><h6 class="f-h6">8. CITIZENSHIP</h6><input type="text" class="f-input mt-1" value="FILIPINO"></div>
                            <div class="c-6 pl-2"><h6 class="f-h6">9. RELIGION/RELIGIOUS SECT</h6><input type="text" class="f-input mt-1"></div>
                        </div>
                        <div class="f-row border-b-green pad-inner pb-1">
                            <div class="c-2 border-r-green pr-1"><h6 class="f-h6">10a. <span class="font-normal">Total number of children born alive</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-2 border-r-green px-1"><h6 class="f-h6">10b. <span class="font-normal">No. of children still living...</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-2 border-r-green px-1"><h6 class="f-h6">10c. <span class="font-normal">No. of children born alive but...</span></h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-4 border-r-green px-1"><h6 class="f-h6">11. OCCUPATION</h6><input type="text" class="f-input text-center mt-[14px]"></div>
                            <div class="c-2 pl-1"><h6 class="f-h6">12. <span class="font-normal">AGE at time of this birth</span> <span class="f-label-green inline">(completed years)</span></h6><input type="text" class="f-input text-center mt-1"></div>
                        </div>
                        <div class="f-row pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">13. RESIDENCE</h6></div>
                            <div class="c-4 pl-6 pr-1"><span class="f-label-green text-left mb-[2px]">(House No.,St.,Barangay)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(City/Municipality)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 px-1"><span class="f-label-green text-left mb-[2px]">(Province)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 pl-1"><span class="f-label-green text-left mb-[2px]">(Country)</span><input type="text" class="f-input text-center"></div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0">
                    <div class="v-text border-r-green">FATHER</div>
                    <div style="width: calc(100% - 34px);" class="flex flex-col">
                        <div class="f-row border-b-green pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">14. NAME</h6></div>
                            <div class="c-4 px-1"><span class="f-label-green">(First)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-4 px-1"><span class="f-label-green">(Middle)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green">(Last)</span><input type="text" class="f-input text-center"></div>
                        </div>
                        <div class="f-row border-b-green pad-inner pb-1">
                            <div class="c-3 border-r-green pr-2"><h6 class="f-h6">15. CITIZENSHIP</h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-4 border-r-green px-2"><h6 class="f-h6">16. RELIGION/RELIGIOUS SECT</h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-3 border-r-green px-2"><h6 class="f-h6">17. OCCUPATION</h6><input type="text" class="f-input text-center mt-1"></div>
                            <div class="c-2 pl-2"><h6 class="f-h6">18. <span class="font-normal">AGE <span class="f-label-green inline">(completed years)</span></span></h6><input type="text" class="f-input text-center mt-1"></div>
                        </div>
                        <div class="f-row pad-inner items-end pb-1">
                            <div class="c-1"><h6 class="f-h6">19. RESIDENCE</h6></div>
                            <div class="c-4 pl-6 pr-1"><span class="f-label-green text-left mb-[2px]">(House No.,St.,Barangay)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-3 px-1"><span class="f-label-green text-left mb-[2px]">(City/Municipality)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 px-1"><span class="f-label-green text-left mb-[2px]">(Province)</span><input type="text" class="f-input text-center"></div>
                            <div class="c-2 pl-1"><span class="f-label-green text-left mb-[2px]">(Country)</span><input type="text" class="f-input text-center"></div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12"><h6 class="f-h6">MARRIAGE OF PARENTS <span class="font-normal">(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6></div>
                    <div class="c-12 f-row border-t-green mt-1 pt-1">
                        <div class="c-1"><h6 class="f-h6">20a. DATE</h6></div>
                        <div class="c-3 px-1">
                            <div class="f-row"><span class="f-label-green c-4">(Month)</span><span class="f-label-green c-4">(Day)</span><span class="f-label-green c-4">(Year)</span></div>
                            <input type="text" class="f-input text-center mt-[2px]" style="word-spacing: 2em;">
                        </div>
                        <div class="c-1 border-l-green pl-2"><h6 class="f-h6">20b. PLACE</h6></div>
                        <div class="c-7 px-1">
                            <div class="f-row"><span class="f-label-green c-4">(City/Municipality)</span><span class="f-label-green c-4">(Province)</span><span class="f-label-green c-4">(Country)</span></div>
                            <div class="f-row mt-[2px] border border-[#ced4da] rounded-[3px] bg-white h-[24px]">
                                <input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]"><input type="text" class="c-4 bg-transparent border-none text-center outline-none text-[10px]">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12"><h6 class="f-h6">21a. ATTENDANT</h6></div>
                    <div class="c-12 flex gap-4 mt-1">
                        <label class="text-[10px]"><input type="checkbox"> 1 Physician</label>
                        <label class="text-[10px]"><input type="checkbox"> 2 Nurse</label>
                        <label class="text-[10px]"><input type="checkbox"> 3 Midwife</label>
                        <label class="text-[10px]"><input type="checkbox"> 4 Hilot (Traditional)</label>
                        <label class="text-[10px]"><input type="checkbox"> 5 Others (Specify)</label>
                        <input type="text" class="f-input w-48 !h-5 !py-0">
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12"><h6 class="f-h6 mb-1">21b. CERTIFICATION OF ATTENDANT AT BIRTH <span class="f-label-green inline font-normal">(Physician, Nurse, Midwife, etc.)</span></h6></div>
                    <div class="c-12"><p class="text-[10px] m-0 pl-8">I hereby certify that I attended the birth of the child who was born alive at <input type="time" class="f-input !inline-block w-24"> am/pm on the date of birth specified above.</p></div>

                    <div class="c-6 pr-4 mt-2">
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                    </div>
                    <div class="c-6 pl-4 mt-2">
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Address</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24"></span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-6 border-r-green pr-4">
                        <h6 class="f-h6">22. CERTIFICATION OF INFORMANT</h6>
                        <p class="text-[10px] m-0 pl-8 mb-2">I hereby certify that all information supplied are true and correct to my own knowledge and belief.</p>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Relationship to Child</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Address</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-28">Date</span><input type="text" class="f-input"></div>
                    </div>
                    <div class="c-6 pl-4">
                        <h6 class="f-h6 mb-6">23. PREPARED BY</h6>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-6 border-r-green pr-4">
                        <h6 class="f-h6 mb-2">24. RECEIVED BY</h6>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                    <div class="c-6 pl-4">
                        <h6 class="f-h6 mb-2">25. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Signature</span><input type="text" class="f-input !border-t-0 !border-l-0 !border-r-0 !border-b-green !rounded-none"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Name in Print</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Title or Position</span><input type="text" class="f-input"></div>
                        <div class="flex items-center mb-1"><span class="input-addon w-24">Date</span><input type="text" class="f-input"></div>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2">
                    <div class="c-12">
                        <h6 class="f-h6 mb-1">REMARKS/ANNOTATIONS (For LCRO/OCRG Use Only)</h6>
                        <textarea class="w-full border border-gray-300 rounded p-2 text-[10px] uppercase outline-none focus:border-blue-500" rows="3"></textarea>
                    </div>
                </div>

                <div class="f-row br-green !border-t-0 p-2 pb-4">
                    <div class="c-12">
                        <h6 class="f-h6 mb-1">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
                        <p class="text-[10px] font-bold tracking-[1.8em] m-0 pl-1">8 9 11 13 15 16 17 19</p>
                        <div class="flex gap-1 mt-1">
                            <input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                            <input type="text" class="f-input w-8 ml-2"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8"><input type="text" class="f-input w-8">
                        </div>
                    </div>
                </div>

            </div>

            <div id="page2" class="hidden">
                <div class="ctf-birth-back pt-3" style="width:960px;margin: auto;">
                    <div class="form" style="padding:0 15px 0 15px;">
                        <div class="row">
                            <div class="col" style="border: 2px solid green;">
                                <h6 style="padding-top:10px; line-height: 1.2;">
                                    <center><span class="affidavit-title">AFFIDAVIT OF ACKNOWLEDGEMENT/ADMISSION OF PATERNITY</span></center>
                                    <div style="text-align: center; margin-top: 5px;">
                                        <span>(For births on or after 3 August 1988)</span>
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        <span>(For births on or after 3 August 1988)</span>
                                    </div>
                                </h6>
                                <h6 style="padding-top:10px;">&emsp;&emsp;&emsp;&emsp;I/We,
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding:0; width:42%; margin-right:0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="father_name" name="father_name" onkeypress="return isTextKey(event)">
                                </div>
                                and
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 42%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="mother_name" name="mother_name" onkeypress="return isTextKey(event)">
                                </div>
                                ,<br> of legal age, am/are the natural mother and/or father of
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 53%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center text-center" id="child_name" name="child_name" onkeypress="return isTextKey(event)">
                                </div>
                                , who was born on
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:24%; margin-right:0;">
                                    <input type="text" class="form-control form-control-sm text-center text-center" id="birth_date" name="birth_date">
                                </div>
                                at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:45%; margin-right:0;">
                                    <input type="text" class="form-control form-control-sm text-center text-center" id="birth_place" name="birth_place">
                                </div>
                                .
                                </h6><br>
                                <h6 style="letter-spacing: 0.5px;">&emsp;&emsp;&emsp;&emsp;I am / We are executing this affidavit to attest to the truthfulness of the foregoing statements and for purposes of acknowledging my/our child.</h6><br>
                                <div class="row">
                                    <div class="col-6" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0; text-align:center;" id="father_sign" name="father_sign" onkeypress="return isTextKey(event)">
                                        <h6>(Signature Over Printed Name of Father)</h6>
                                    </div>
                                    <div class="col-6" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0; text-align:center;" id="mother_sign" name="mother_sign" onkeypress="return isTextKey(event)">
                                        <h6>(Signature Over Printed Name of Mother)</h6>
                                    </div>
                                </div><br>
                                <h6>&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBSCRIBED AND SWORN</span> to before me this
                                    <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:7%; margin-right:0;">
                                        <input type="text" class="form-control form-control-sm text-center" name="ack_sworn_day" id="ack_sworn_day">
                                    </div>
                                    day of
                                    <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:20%; margin-right:0;">

                                        <input type="text" class="form-control form-control-sm text-center" name="ack_sworn_month" id="ack_sworn_month" onkeypress="return isTextKey(event)">
                                    </div>
                                    ,
                                    <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:8%; margin-right:0;">

                                        <input type="text" class="form-control form-control-sm text-center" maxlength="4" name="ack_sworn_year" id="ack_sworn_year" onkeypress="return isNumberKey(event)">
                                    </div>
                                    by
                                    <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:30%; margin-right:0;">
                                        <input type="text" class="form-control form-control-sm text-center" id="ack_father_sworn" name="ack_sworn_father" onkeypress="return isTextKey(event)">
                                    </div>
                                    and
                                    <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:30%; margin-right:0;">
                                        <input type="text" class="form-control form-control-sm text-center" id="ack_mother_sworn" name="ack_sworn_mother" onkeypress="return isTextKey(event)">
                                    </div>
                                , who exhibited to me
                                <input type="radio" id="gender1" name="birth_gender" value="his" hidden>
                                <label id="gender1lbl" for="gender1">his</label>/
                                <input type="radio" id="gender2" name="birth_gender" value="her" hidden>
                                <label id="gender2lbl" for="gender2">her</label>
                                CTC/valid ID
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="ack_ctc" id="ack_ctc">
                                </div>
                                issued on
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="ack_issued_on" id="ack_issued_on">
                                </div>
                                at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="ack_issued_at" id="ack_issued_at" onkeypress="return isTextKey(event)">
                                </div>
                                .
                                </h6>
                                <br><br>
                                <div class="row">
                                    <div class="col-6" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="ack_officer_sign" disabled>
                                        <h6>Signature of the Administering Officer</h6>

                                        <input type="text" class="form-control form-control-sm text-center" id="ack_sworn_name" name="ack_sworn_name" onkeypress="return isTextKey(event)">
                                        <h6>Name in Print</h6>
                                    </div>
                                    <div class="col-6" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" id="ack_sworn_position" name="ack_sworn_position" onkeypress="return isTextKey(event)">
                                        <h6>Position/Title/Designation</h6>
                                        <input type="text" class="form-control form-control-sm text-center" id="ack_sworn_address" name="ack_sworn_address" onkeypress="return isTextKey(event)">
                                        <h6>Address</h6>
                                    </div>
                                </div>
                            </div>
                        </div><div class="row">
                            <div class="col" style="border: 2px solid green; border-top: none;">
                                <h6 style="padding-top:10px; line-height: 1.2;" align="center">
                                    <span class="affidavit-title"><center>AFFIDAVIT FOR DELAYED REGISTRATION OF BIRTH</center></span>
                                    <span>(To be accomplished by the hospital/clinic administrator, father, mother, or guardian or the person himself if 18 years old or above.)</span>
                                </h6>
                                <h6 style="padding-top:10px;">&emsp;&emsp;&emsp;&emsp;I,
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 50%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="late_name" name="late_name" onkeypress="return isTextKey(event)">
                                </div>
                                , of legal age, single/married/divorced/widow/widower, with residence and postal address at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 76%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="late_address" name="late_address" onkeypress="return isTextKey(event)">
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
                                </div>
                                <span style="letter-spacing:0.5px;">after having been duly sworn in accordance with law, do hereby depose and say:</span>
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;1.&emsp;That I am the applicant for the delayed registration of:<br>
                                &emsp;&emsp;&emsp;&emsp;&emsp;
                                <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
                                    <input type="checkbox" class="custom-control-input text-center" id="my_birth" name="late_birth_type" value="my birth">
                                    <label class="custom-control-label" for="my_birth">&nbsp;my birth in</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="bplace1" name="late_birth_in" onkeypress="return isTextKey(event)">
                                </div>
                                on
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="bday1" name="late_birth_on" >
                                </div>
                                &emsp;&emsp;&emsp;&emsp;&emsp;
                                <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
                                    <input type="checkbox" class="custom-control-input text-center" id="the_birth" name="late_birth_type2" value="the birth">
                                    <label class="custom-control-label" for="the_birth">&nbsp;the birth of</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 32%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="childlatename" name="late_birth_of" onkeypress="return isTextKey(event)">
                                </div>
                                who was born in
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="bplace2" name="late_birth_in2" onkeypress="return isTextKey(event)">
                                </div>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
                                </div>
                                on
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="bday2" name="late_birth_on2">
                                </div>
                                .
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;2.&emsp;That I/he/she was attended at birth by
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="attend_birth_by" name="attend_birth_by">
                                </div>
                                who resides at
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm" id="who_resides_at" name="who_resides_at" onkeypress="return isTextKey(event)">
                                </div>
                                .
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;3.&emsp;That I/he/she is a citizen of
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="late_citizen" name="late_citizen">
                                </div>
                                .
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;4.&emsp;That my/his/her parents were&emsp;
                                <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
                                    <input type="checkbox" class="custom-control-input text-center" id="married" name="married_type" value="married">
                                    <label class="custom-control-label" for="married">&nbsp;married on</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="married_txt1" name="married_on" >
                                </div>
                                at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center"  id="married_txt2" name="married_at" onkeypress="return isTextKey(event)">
                                </div>
                                <br>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
                                    <input type="checkbox" class="custom-control-input text-center" id="not_married" name="married_type2" value="not married">
                                    <label class="custom-control-label" for="not_married">&nbsp;not married but I/he/she  <div class="custom-dropdown">
                                    <span id="selected-text">was acknowledged</span>
                                     <select id="status-select">
                            <option value="acknowledged">was acknowledged</option>
                                 <option value="not_acknowledged"> not acknowledged</option>
                    </select>
                                </div>by my/his/her</label>
                                </div><br>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                father whose name is
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 45%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="not_married_txt" name="not_married_name" onkeypress="return isTextKey(event)">
                                </div>
                                .
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;5.&emsp;That the reason for the delay in registering my/his/her birth was
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="late_reason_1" >
                                </div>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="late_reason_2" value="{{ old('late_reason_2') }}">
                                </div>
                                .
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;6.&emsp;(For the applicant only)&emsp;That I am married to
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="applicant_only" onkeypress="return isTextKey(event)">
                                </div>
                                .
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;(If the applicant is other than the document owner)&emsp;That I am the
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="applicant_relation" name="applicant_than_owner" onkeypress="return isTextKey(event)">
                                </div>
                                of the said person.
                                </h6>
                                <h6>&emsp;&emsp;&emsp;&emsp;7.&emsp;That I am executing this affidavit to attest to the truthfulness of the foregoing statements for all legal intents and purposes.</h6><br>
                                <h6>&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
                                <div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 8%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="sign_day" name="sign_day">
                                </div>
                                day of
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 18%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="sign_month" name="sign_month" onkeypress="return isTextKey(event)">
                                </div>
                                ,
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 8%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sign_year" name="sign_year" onkeypress="return isNumberKey(event)">
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
                                </div>
                                at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="sign_at" name="sign_at" onkeypress="return isTextKey(event)">
                                </div>
                                , Philippines.
                                </h6>
                                <div class="row">
                                    <div class="col-7" align="center"></div>
                                    <div class="col-5" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" id="affiant_name" name="affiant_name" onkeypress="return isTextKey(event)">
                                        <h6>(Signature Over Printed Name of Affiant)</h6>
                                    </div>
                                </div><br>
                                <h6>&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBSCRIBED AND SWORN</span> to before me this
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 7%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="sworn_day" name="late_sworn_day">
                                </div>
                                day of
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 18%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="sworn_month" name="late_sworn_month" onkeypress="return isTextKey(event)">
                                </div>
                                ,
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 8%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sworn_year" name="late_sworn_year" onkeypress="return isNumberKey(event)">
                                </div>
                                at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" id="sworn_at" name="late_sworn_at" onkeypress="return isTextKey(event)">
                                </div>
                                <span style="letter-spacing: 0.5px;">, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="late_ctc" id="late_ctc">
                                </div>
                                issued on
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="late_issued_on" id="late_issued_on">
                                </div>
                                at
                                <div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
                                    <input type="text" class="form-control form-control-sm text-center" name="late_issued_at" id="late_issued_at" onkeypress="return isTextKey(event)">
                                </div>

                                </h6><br><br>
                                <div class="row">
                                    <div class="col-6" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="late_officer_sign" disabled>
                                        <h6>Signature of the Administering Officer</h6>
                                        <input type="text" class="form-control form-control-sm text-center" id="late_sworn_name" name="late_sworn_name" onkeypress="return isTextKey(event)">
                                        <h6>Name in Print</h6>
                                    </div>
                                    <div class="col-6" align="center">
                                        <input type="text" class="form-control form-control-sm text-center" id="late_sworn_position" name="late_sworn_position" onkeypress="return isTextKey(event)">
                                        <h6>Position/Title/Designation</h6>
                                        <input type="text" class="form-control form-control-sm text-center" id="late_sworn_address" name="late_sworn_address" onkeypress="return isTextKey(event)">
                                        <h6>Address</h6>
                                    </div>
                                </div>
                            </div>
                        </div></div>
                </div>
            </div>
        </div>

        <div class="max-w-[960px] mx-auto">
            <button type="submit" class="w-full bg-[#17a2b8] hover:bg-[#138496] text-white font-bold py-4 rounded uppercase tracking-[5px] text-xl transition shadow-lg border border-[#17a2b8]">SAVE</button>
        </div>
    </form>
</div>

<script>
    function showP(id) {
        document.getElementById('page1').classList.toggle('hidden', id !== 'page1');
        document.getElementById('page2').classList.toggle('hidden', id !== 'page2');
        document.getElementById('p1').className = (id === 'page1') ? 'btn-outline-info active' : 'btn-outline-info';
        document.getElementById('p2').className = (id === 'page2') ? 'btn-outline-info active' : 'btn-outline-info';
    }

    // Day validation for all day fields
    $(document).ready(function(){
        $("#ack_sworn_day, #sign_day, #sworn_day").keyup(function(){
            var a = $(this).val();
            var numVal = parseInt(a);
            if(numVal >= 32 || numVal <= 0){
                alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show();
                $(this).val("");
            }
        });
    });

    // Move to next input on Enter key
    document.addEventListener("DOMContentLoaded", function() {
        let inputs = document.querySelectorAll(".form-control");

        inputs.forEach((input, index) => {
            input.addEventListener("keydown", function(event) {
                if(event.key === "Enter"){
                    event.preventDefault();
                    let nextInput = inputs[index + 1];
                    if (nextInput){
                        nextInput.focus();
                    }
                }
            });
        });
    });

    // Auto-check "the birth" checkbox when filling child late name
    document.getElementById("childlatename").addEventListener("input", function() {
        if(this.value.trim() !== "") {
            document.getElementById("the_birth").checked = true;
            document.getElementById("my_birth").checked = false;
        }
    });

    document.getElementById("bplace1").addEventListener("input", function() {
        if(this.value.trim() !== "") {
            document.getElementById("my_birth").checked = true;
            document.getElementById("the_birth").checked = false;
        }
    });

    // Auto-check married checkbox when filling married date
    document.getElementById("married_txt1").addEventListener("input", function() {
        if(this.value.trim() !== "") {
            document.getElementById("married").checked = true;
            document.getElementById("not_married").checked = false;
        }
    });

    document.getElementById("not_married_txt").addEventListener("input", function() {
        if(this.value.trim() !== "") {
            document.getElementById("not_married").checked = true;
            document.getElementById("married").checked = false;
        }
    });

    // Sync Fields from Local Storage
    $(document).ready(function() {
        function getOrdinal(n) {
            let s = ["TH", "ST", "ND", "RD"], v = n % 100;
            return n + (s[(v - 20) % 10] || s[v] || s[0]);
        }

        function formatDateFormal(inputVal) {
            if (!inputVal) return "";
            const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
            let v = inputVal.replace(/\s\s+/g, ' ').trim().toUpperCase();
            let parts = v.split(/[\s\/,\.-]+/);

            if (parts.length >= 3) {
                let day = parts[0], month = parts[1], year = parts[2];
                if (MON.includes(month)) return `${month} ${day}, ${year}`;
                if (MON.includes(day)) return `${day} ${parts[1]}, ${parts[2]}`;
                const mIdx = parseInt(month, 10);
                if (!isNaN(mIdx) && mIdx >= 1 && mIdx <= 12) return `${MON[mIdx - 1]} ${day}, ${year}`;
            }
            return v;
        }

        function syncCurrentField(focusedElement) {
            const rawData = localStorage.getItem('birth_form_data');
            const data = rawData ? JSON.parse(rawData) : {};
            const elementId = $(focusedElement).attr('id');
            let valueToFill = "";
            const now = new Date();
            const currentDay = now.getDate();
            const currentYear = now.getFullYear();
            const currentMonthName = now.toLocaleString('default', { month: 'long' }).toUpperCase();
            const fName = `${data.father_fname || ''} ${data.father_mname || ''} ${data.father_lname || ''}`.trim().toUpperCase();
            const mName = `${data.mother_fname || ''} ${data.mother_mname || ''} ${data.mother_lname || ''}`.trim().toUpperCase();

            switch (elementId) {
                case 'sworn_day': case 'ack_sworn_day': case 'sign_day': valueToFill = getOrdinal(currentDay); break;
                case 'sworn_month': case 'ack_sworn_month': case 'sign_month': valueToFill = currentMonthName; break;
                case 'sworn_year': case 'ack_sworn_year': case 'sign_year': valueToFill = currentYear.toString(); break;
                case 'late_name': case 'affiant_name': valueToFill = data.informant_name || ""; break;
                case 'late_address': valueToFill = data.informant_address || ""; break;
                case 'applicant_than_owner': case 'applicant_relation': valueToFill = data.rel_child || ""; break;
                case 'birth_place': case 'bplace1': case 'bplace2': case 'late_birth_in': case 'late_birth_in2': valueToFill = data.birth_place || ""; break;
                case 'birth_date': case 'bday2': case 'bday1': case 'late_birth_on':
                    let storedDate = data.birth_day || "";
                    if (storedDate) valueToFill = formatDateFormal(storedDate);
                    break;
                case 'late_citizen': valueToFill = "PHILIPPINES"; break;
                case 'ack_sworn_name': case 'late_sworn_name': valueToFill = data.civil_name || ""; break;
                case 'ack_sworn_position': case 'late_sworn_position': valueToFill = data.civil_position || "MUNICIPAL CIVIL REGISTRAR"; break;
                case 'ack_sworn_address': case 'late_sworn_address': case 'sworn_at': case 'sign_at': valueToFill = "GERONA, TARLAC"; break;
                case 'child_name': case 'childlatename': case 'late_birth_of': valueToFill = `${data.child_fname || ''} ${data.child_mname || ''} ${data.child_lname || ''}`; break;
                case 'father_name': case 'father_sign': case 'ack_father_sworn': case 'not_married_txt': valueToFill = fName; break;
                case 'mother_name': case 'mother_sign': case 'ack_mother_sworn': valueToFill = mName; break;
                case 'married_txt1': valueToFill = data.marriage_date || ""; break;
                case 'married_txt2': valueToFill = data.marriage_place || ""; break;
                case 'attend_birth_by': valueToFill = data.attendant_name || ""; break;
                case 'who_resides_at': valueToFill = data.attendant_address || ""; break;
            }

            if (valueToFill) {
                $(focusedElement).val(valueToFill.trim().toUpperCase());
            }
        }

        $('input').on('keydown', function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                syncCurrentField(this);
                const allInputs = $('input:visible:not([disabled])');
                const index = allInputs.index(this);
                if (index > -1 && index < allInputs.length - 1) {
                    allInputs.eq(index + 1).focus();
                }
            }
        });

        // Generate suggestions from memory
        function updateSuggestions() {
            const raw = localStorage.getItem('birth_form_data');
            if (!raw) return;
            const data = JSON.parse(raw);
            Object.keys(data).forEach(key => {
                let val = data[key];
                if (val && val.trim() !== "") {
                    let listId = "list_" + key;
                    if ($("#" + listId).length === 0) $('body').append(`<datalist id="${listId}"></datalist>`);
                    let datalist = $("#" + listId);
                    if (datalist.find(`option[value='${val.toUpperCase()}']`).length === 0) {
                        datalist.append(`<option value="${val.toUpperCase()}">`);
                    }
                    $(`#${key}`).attr('list', listId);
                }
            });
        }
        updateSuggestions();
    });

    const selectElement = document.getElementById('status-select');
    const textDisplay = document.getElementById('selected-text');
    if(selectElement) {
        selectElement.addEventListener('change', function() {
            textDisplay.textContent = this.options[this.selectedIndex].text;
        });
    }
</script>
@endsection

