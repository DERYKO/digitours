import client from "./client";

export default {
    async getActivities(filters) {
        return client.parseResponse(await client.get('/activity', filters));
    },
    async getActivity(id) {
        return client.parseResponse(await client.get('/activity/' + id));
    },
    async deleteActivities(activity) {
        return client.parseResponse(await client.delete('/activity/' + activity.id));
    },
    async createActivity(form) {
        let {file} = form;
        return client.parseResponse(await client.upload('/activity', form, file));
    },
    async updateActivity(form) {
        let {file} = form;
        return client.parseResponse(await client.put('/activity/' + form.id, form, file));
    },
    async getSubActivities(filters) {
        return client.parseResponse(await client.get('/sub-activity', filters));
    },
    async getSubActivity(id) {
        return client.parseResponse(await client.get('/sub-activity/' + id));
    },
    async deleteSubActivities(activity) {
        return client.parseResponse(await client.delete('/sub-activity/' + activity.id));
    },
    async createSubActivity(form) {
        let {file} = form;
        return client.parseResponse(await client.upload('/sub-activity', form, file));
    },
    async updateSubActivity(form) {
        let {file} = form;
        return client.parseResponse(await client.put('/sub-activity/' + form.id, form, file));
    }
}
