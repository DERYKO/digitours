import client from "./client";
export default {
    async getActivities(filters){
        return client.parseResponse(await client.get('/activity',filters));
    },
    async deleteActivities(activity){
        return client.parseResponse(await client.delete('/activity/'+activity.id));
    }
}
