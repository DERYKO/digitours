import profile from './profile.api';
import activities from './activities.api';
import travel_destinations from './travel_destinations.api';
import contact_types from './contact_types.api';

export default {
    ...profile,
    ...activities,
    ...travel_destinations,
    ...contact_types
}
