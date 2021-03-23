<template>
    <div>
        <!-- Fixed Center Placement Toast Starts -->
        <li class="nav-item dropdown dropdown-notification mr-25">
            <a class="nav-link" data-toggle="dropdown"
               href="javascript:void(0);">
                <i class="ficon" data-feather="bell"></i>
                <span class="badge badge-pill badge-danger badge-up" v-if="unseen > 0 ">{{unseen}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                    <div class="dropdown-header d-flex">
                        <h4 class="notification-title mb-0 mr-auto">{{trans.notifications}}</h4>
                        <div class="badge badge-pill badge-light-primary" v-if="unseen > 0 ">{{unseen}} {{trans.new_notifications}}</div>
                    </div>
                </li>
                <li class="scrollable-container media-list">
                    <a class="d-flex"
                       href="javascript:void(0)"
                       v-for="(item , index) in notifications" :key="index">
                        <div class="media d-flex align-items-start">
                            <div class="media-left">
                                <div class="avatar bg-light-success" v-if="user.type === 'customer'">
                                    <div class="avatar-content">GM</div>
                                </div>
                                <div class="avatar"  v-if="['super_admin' , 'admin'].includes(user.type) ">
                                    <img alt="avatar"
                                         height="32"
                                         :src="item.user.profile_picture"
                                         width="32">
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="media-heading">
                                    {{item.description}}
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="dropdown-menu-footer">
                    <a class="btn btn-primary btn-block" v-on:click="deleteAllNotifications">
                        {{trans.read_all_notifications}}
                    </a>
                </li>
            </ul>
        </li>
        <!-- Fixed Center Placement Toast ends -->
    </div>
</template>

<script>
import {XIcon} from "vue-feather-icons";

export default {
    data() {
        return {
            notifications: [],
            unseen:0,
            trans: [],
        }
    },
    components: {
        XIcon
    },
    props: ['user'],
    mounted() {
        this.getThisUserNotifications();
    },
    computed: {},
    watch: {},
    methods: {
        async getThisUserNotifications() {
             let user_id =this.user.id;
             let url = '/api/v1/notifications/'+user_id;
             this.notifications.length = 0
             await axios.get(url).then(response => {
                 this.notifications = response.data.data
                 this.unseen = response.data.unseen
                 this.trans = response.data.trans
             });
             },
         async deleteAllNotifications(){
             let user_id =this.user.id;
             let url = '/api/v1/notifications/delete/'+user_id;
             await axios.get(url).then(response => {
                 this.getThisUserNotifications()
             });

         }
    }
}
</script>
