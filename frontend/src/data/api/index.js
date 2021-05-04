import profile from './profile.api';
import activities from './activities.api';
import travel_destinations from './travel_destinations.api';

export default {
    ...profile,
    ...activities,
    ...travel_destinations
}
