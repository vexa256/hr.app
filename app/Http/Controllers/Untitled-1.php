<div class="v-card-text">
    <div class="v-row justify-center">
        <div class="v-col-md-12 v-col-12">
            <form class="v-form" novalidate="" id="AddModule">
                <div>
                    <div class="v-row">
                        <div class="v-col-sm-6 v-col-md-4 v-col-12 field-container">
                            <!-- Text or Number Field -->
                            <div
                                class="v-input v-input--horizontal v-input--center-affix v-input--density-default v-locale--is-ltr v-text-field">
                                <div class="v-input__prepend">
                                    <!----><i
                                        class="mdi-message-text mdi v-icon notranslate v-theme--light v-icon--size-default"
                                        aria-hidden="true"></i>
                                </div>
                                <div class="v-input__control">
                                    <div
                                        class="v-field v-field--appended v-field--center-affix v-field--variant-filled v-theme--light v-locale--is-ltr">
                                        <div class="v-field__overlay"></div>
                                        <div class="v-field__loader">
                                            <div class="v-progress-linear v-theme--light v-locale--is-ltr"
                                                role="progressbar" aria-hidden="true" aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="top: 0px; height: 0px; --v-progress-linear-height: 2px; left: 50%; transform: translateX(-50%);">
                                                <!---->
                                                <div class="v-progress-linear__background" style="width: 100%;"></div>
                                                <div class="v-progress-linear__indeterminate">
                                                    <div class="v-progress-linear__indeterminate long"></div>
                                                    <div class="v-progress-linear__indeterminate short"></div>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <!---->
                                        <div class="v-field__field" data-no-activator=""><label
                                                class="v-label v-field-label v-field-label--floating" aria-hidden="true"
                                                for="input-75">
                                                <!---->Project Module
                                            </label><label class="v-label v-field-label" for="input-75">
                                                <!---->Project Module
                                            </label>
                                            <!----><input name="ProjectModule" size="1" type="text" id="input-75"
                                                aria-describedby="input-75-messages" dense="" outlined=""
                                                class="v-field__input">
                                            <!---->
                                        </div>
                                        <div class="v-field__clearable" style="display: none;"><i
                                                class="mdi-close-circle mdi v-icon notranslate v-theme--light v-icon--size-default v-icon--clickable"
                                                role="button" aria-hidden="false" aria-label="Clear Project Module"></i>
                                        </div>
                                        <div class="v-field__append-inner">
                                            <!---->
                                            <!---->
                                        </div>
                                        <div class="v-field__outline">
                                            <!---->
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <div class="v-input__details">
                                    <div class="v-messages" role="alert" aria-live="polite" id="input-75-messages">
                                    </div>
                                    <!---->
                                </div>
                            </div><!-- Other field types as necessary -->
                        </div>
                        <div class="v-col-sm-6 v-col-md-4 v-col-12 field-container">
                            <!-- Text or Number Field -->
                            <div
                                class="v-input v-input--horizontal v-input--center-affix v-input--density-default v-locale--is-ltr v-text-field">
                                <div class="v-input__prepend">
                                    <!----><i
                                        class="mdi-wrench mdi v-icon notranslate v-theme--light v-icon--size-default"
                                        aria-hidden="true"></i>
                                </div>
                                <div class="v-input__control">
                                    <div
                                        class="v-field v-field--appended v-field--center-affix v-field--variant-filled v-theme--light v-locale--is-ltr">
                                        <div class="v-field__overlay"></div>
                                        <div class="v-field__loader">
                                            <div class="v-progress-linear v-theme--light v-locale--is-ltr"
                                                role="progressbar" aria-hidden="true" aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="top: 0px; height: 0px; --v-progress-linear-height: 2px; left: 50%; transform: translateX(-50%);">
                                                <!---->
                                                <div class="v-progress-linear__background" style="width: 100%;"></div>
                                                <div class="v-progress-linear__indeterminate">
                                                    <div class="v-progress-linear__indeterminate long"></div>
                                                    <div class="v-progress-linear__indeterminate short"></div>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <!---->
                                        <div class="v-field__field" data-no-activator=""><label
                                                class="v-label v-field-label v-field-label--floating" aria-hidden="true"
                                                for="input-77">
                                                <!---->Description
                                            </label><label class="v-label v-field-label" for="input-77">
                                                <!---->Description
                                            </label>
                                            <!----><input name="Description" size="1" type="text" id="input-77"
                                                aria-describedby="input-77-messages" dense="" outlined=""
                                                class="v-field__input">
                                            <!---->
                                        </div>
                                        <div class="v-field__clearable" style="display: none;"><i
                                                class="mdi-close-circle mdi v-icon notranslate v-theme--light v-icon--size-default v-icon--clickable"
                                                role="button" aria-hidden="false" aria-label="Clear Description"></i>
                                        </div>
                                        <div class="v-field__append-inner">
                                            <!---->
                                            <!---->
                                        </div>
                                        <div class="v-field__outline">
                                            <!---->
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <div class="v-input__details">
                                    <div class="v-messages" role="alert" aria-live="polite" id="input-77-messages">
                                    </div>
                                    <!---->
                                </div>
                            </div><!-- Other field types as necessary -->
                        </div>
                    </div>
                </div>
                <global-select tablename="clusters" idfield="CID" namefield="ClusterName"
                    excludecolumns="created_at,updated_at"></global-select>
                <div
                    class="v-input v-input--horizontal v-input--center-affix v-input--density-default v-locale--is-ltr v-input--dirty v-text-field">
                    <!---->
                    <div class="v-input__control">
                        <div
                            class="v-field v-field--active v-field--center-affix v-field--dirty v-field--no-label v-field--variant-filled v-theme--light v-locale--is-ltr">
                            <div class="v-field__overlay"></div>
                            <div class="v-field__loader">
                                <div class="v-progress-linear v-theme--light v-locale--is-ltr" role="progressbar"
                                    aria-hidden="true" aria-valuemin="0" aria-valuemax="100"
                                    style="top: 0px; height: 0px; --v-progress-linear-height: 2px; left: 50%; transform: translateX(-50%);">
                                    <!---->
                                    <div class="v-progress-linear__background" style="width: 100%;"></div>
                                    <div class="v-progress-linear__indeterminate">
                                        <div class="v-progress-linear__indeterminate long"></div>
                                        <div class="v-progress-linear__indeterminate short"></div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <!---->
                            <div class="v-field__field" data-no-activator="">
                                <!----><label class="v-label v-field-label" for="input-72">
                                    <!---->
                                    <!---->
                                </label>
                                <!----><input name="MID" size="1" type="text" id="input-72"
                                    aria-describedby="input-72-messages" class="v-field__input">
                                <!---->
                            </div>
                            <!---->
                            <!---->
                            <div class="v-field__outline">
                                <!---->
                                <!---->
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="v-input__details">
                        <div class="v-messages" role="alert" aria-live="polite" id="input-72-messages"></div>
                        <!---->
                    </div>
                </div><button type="button"
                    class="v-btn v-btn--elevated v-theme--light bg-primary v-btn--density-default v-btn--size-default v-btn--variant-elevated elevation-2"><span
                        class="v-btn__overlay"></span><span class="v-btn__underlay"></span>
                    <!----><span class="v-btn__content" data-no-activator=""><i
                            class="mdi-content-save mdi v-icon notranslate v-theme--light v-icon--size-default"
                            aria-hidden="true" left=""></i>Save </span>
                    <!---->
                    <!---->
                </button>
            </form>
        </div>
    </div>
</div>