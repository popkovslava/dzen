<template>
    <section class="container works-filter">
        <div class="column w-25">
            <form>
                <template v-for="stack in stacks">
                    <div class="checkbox technology">
                        <input @click="checkStaks" type="checkbox" :name="stack.title" :id="stack.title" :value="stack.id" v-model="checkedStacks">
                        <label :for="stack.title">{{ stack.title }}<span></span></label>
                    </div>
                </template>
            </form>
        </div>

        <div class="column w-75">
            <div class="projects-gallery" v-if="works">
                <template v-for="(work, workIndex) in works">
                    <div v-if="work.page" :class="[((workIndex + 1) % 4 == 1 || (workIndex + 1) % 4 == 0) ? 'w-66' : 'w-33', 'project']">
                        <a :href="getUrlSlug(work.page.slug)">
                            <div class="image progressive" :style="bgStyle(work.image_mini)">
                                <picture>
                                    <source type="image/webp"
                                        :sizes="renderSizes((workIndex + 1) % 4 == 1 || (workIndex + 1) % 4 == 0)"
                                        :srcset="renderSrcset(work, 'webp')"
                                    >
                                    <img class="hide"
                                        :sizes="renderSizes((workIndex + 1) % 4 == 1 || (workIndex + 1) % 4 == 0)"
                                        :src="work.image_mini" 
                                        :alt="work.title_single" 
                                        :data-normal="((workIndex + 1) % 4 == 1 || (workIndex + 1) % 4 == 0) ?
                                            work.image_large :
                                            work.image_medium
                                        " 
                                        :data-srcset="renderSrcset(work)"
                                    >
                                </picture>
                            </div>
      
                            <div class="project-info">
                                <div class="project-logo" :style="bgStyle(work.title_img)"></div>

                                <template v-if="work.stack_category_id">

                                    <template v-for="(stack, stackIndex) in getStackCategory(work.stack_category_id)">
                                        
                                        <span class="use">
                                            <template v-if="stackIndex <1">
                                                {{ stack.title }}
                                            </template>
                                            <template v-else>
                                                {{ ` | ${stack.title}` }}
                                            </template>
                                        </span>

                                    </template>
                                </template>
                            </div>

                        </a>
                    </div>
                </template>
            </div>
        </div>

    </section>
</template>


<script>

    import merge from 'lodash/merge';
    import concat from 'lodash/concat';
    import forEach from 'lodash/forEach';
    import upperFirst from 'lodash/upperFirst';
    import isEmpty from 'lodash/isEmpty';
    import find from 'lodash/find';

    let _ = {
        merge,
        concat,
        forEach,
        upperFirst,
        isEmpty,
        find
    };

    export default {
        props:{
            propWorks: {
                type: Array,
                default: ()=>[]
            },
            propStacks: {
                type: Array,
                default: ()=>[]
            },
            propStackCategories: {
                type: Array,
                default: ()=>[]
            }
        },
        data() {
            return{
                works: [],
                stacks: [],
                stackCategories: [],
                checkedStacks: [],
                requestsEvents: {
                    stacks: {}
                },
                actions: {
                    stacks: 'index-stack',
                    works: 'index-work',
                    stackCategories: 'index-stack-category'
                },
                defaultRequestParams: {
                    perpage: 25
                }
            }
        },
        computed:{
        },
        methods: {
            bgStyle(value) {
                return {
                    backgroundImage: (value) ? `url('${value}')` : ''
                }
            },
            getUrlSlug(value) {
                return `//${location.hostname}/${value}`
            },
            checkStaks(event) {
                if (!this.requestsEvents.stacks[event.type]) {
                    this.requestsEvents.stacks[event.type] = []
                }
                _.forEach(this.requestsEvents.stacks[event.type], (event) => {
                    clearTimeout(event);
                })
                this.requestsEvents.stacks[event.type] = []
                let timeout = setTimeout(()=>{
                    let params = {
                        method: "GET",
                        params: {
                            stacks: this.checkedStacks
                        }
                    }
                    params.params = _.merge({}, this.defaultRequestParams, params.params)
                    this.request(this.actions.works, params)
                        .then((response)=>{
                            this.successData(response, 'works')
                            this.requestsEvents.stacks[event.type] = []
                        })
                        .catch(this.errorData)
                }, 500)
                this.requestsEvents.stacks[event.type].push(timeout)
            },
            successData(response, name) {
                if (response.status === 200) {
                    this[name] = response.data.data
                }
                setTimeout(() => {
                    instanceLayzr
                        .update()
                        .check();
                }, 50);
            },
            errorData(error) {
                console.log(error)
            },
            getStackCategory(id) {
                id=parseInt(id)
                let category = _.find(this.stackCategories, {id})
                return category ? category.stacks : []
            },
            request(action, params, data, cb) {
                let methods = {
                        'index' : [
                            "GET",
                            "/api/{url}"
                        ],
                        'create' : [
                            "GET",
                            "/api/{url}/create"
                        ],
                        'store' : [
                            "POST",
                            "/api/{url}"
                        ],
                        'show' : [
                            "GET",
                            "/api/{url}/{id}"
                        ],
                        'edit' : [
                            "GET",
                            "/api/{url}/{id}/edit"
                        ],
                        'update' : [
                            "PUT",
                            "/api/{url}/{id}"
                        ],
                        'destroy' : [
                            "DELETE",
                            "/api/{url}/{id}"
                        ]
                    },
                    act = action.split(/-(.+)/),
                    req = {
                        method: 'GET',
                        params: {}
                    },
                    isData = false;

                req = params ? _.merge({}, req, params) : req
                if (act[0] && methods[act[0]]) {
                    req.method = methods[act[0]][0]
                    req.url = methods[act[0]][1]
                    req.url = req.url.replace(/{url}/, act[1])
                    if (data) {
                        if (Array.isArray(data)) {
                            req.url = req.url.replace(/{id}/, "")
                            data = {"items": data}
                            isData = true
                        } else {
                            req.url = req.url.replace(/{id}/, data.id)
                        }
                    }
                } else {
                    req.url = action;
                }
                if (isData || (req.method === 'POST' || req.method === 'PUT')) {
                    req.data = data
                }
                if (cb) {
                    this.$http(req)
                        .then(function(response) {
                            typeof cb === 'function' && cb(response)
                        })
                        .catch(function (error) {
                            console.log(error)
                        });
                } else {
                    return this.$http(req)
                }
            },
            getAllData(actions, params = {}) {
                _.forEach(actions, (action, name) => {
                    let cb = (response) => {
                        if (response.status === 200) {
                            this[name] = _.concat(this[name], response.data.data)
                            if (response.data.next_page_url) {
                                this.request(response.data.next_page_url, _.merge({params: this.defaultRequestParams}, params), null, cb)
                            }
                        }
                    }
                    this.request(action, _.merge({params: this.defaultRequestParams}, params), null, cb);
                });
            },
            getAllDataActions() {
                let emptyActions = {}
                _.forEach(this.actions, (action, name) => {
                    if (_.isEmpty(this['prop' + _.upperFirst(name)])) {
                        emptyActions[name] = action
                    } else {
                        this[name] = this['prop' + _.upperFirst(name)]
                    }
                })
                return emptyActions
            },
            replaseExtension(path, ext) {
                if (!path) {
                    return false;
                }
                if (!ext) {
                    return encodeURI(path);
                }
                return encodeURI(path.substr(0, path.lastIndexOf(".")) + `.${ext}`);
            },
            renderSrcset(work, ext = '') {
                let set = '';
                set += work.image_thumb ? `${this.replaseExtension(work.image_thumb, ext)} 200w, ` : '';
                set += work.image_small ? `${this.replaseExtension(work.image_small, ext)} 400w, ` : '';
                set += work.image_medium ? `${this.replaseExtension(work.image_medium, ext)} 600w, ` : '';
                set += work.image_large ? `${this.replaseExtension(work.image_large, ext)} 800w, ` : '';
                set += work.image ? `${this.replaseExtension(work.image, ext)} 1200w` : '';
                return set;
            },
            renderSizes(big) {
                let sizes = '';
                sizes += '(max-width: 978px) 800px, ';
                sizes += '(max-width: 1136px) ' + (big ? 'calc(75vw*0.55 - 30px), ' : 'calc(75vw*0.45 - 30px), ');
                sizes += big ? 'calc(75vw*0.66 - 30px) ' : 'calc(75vw*0.33 - 30px) ';
                return sizes;
            }
        },
        mounted() {
            let action = this.getAllDataActions()
            this.getAllData(action)
        }
    }
</script>